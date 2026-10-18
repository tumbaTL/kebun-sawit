<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRecord;
use App\Models\Tree;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelolaPerawatanController extends Controller
{
    public function index()
    {
        $trees = Tree::with('block')->orderBy('tree_code')->get();
        $workers = User::query()
            ->where('role', 'pekerja')
            ->orderBy('name')
            ->get();

        $maintenances = MaintenanceRecord::with(['tree.block', 'worker'])
            ->latest('maintenance_date')
            ->latest('id')
            ->paginate(5);

        $nextId = ((int) MaintenanceRecord::max('id')) + 1;
        $nextMaintenanceCode = 'MT-' . now()->format('ymd') . '-' . str_pad((string) $nextId, 4, '0', STR_PAD_LEFT);

        $latest = MaintenanceRecord::latest('updated_at')->first();
        $lastUpdatedLabel = $latest
            ? 'Updated ' . $latest->updated_at->diffForHumans()
            : 'Belum ada data';

        return view('dashboard.perawatan', compact(
            'trees',
            'workers',
            'maintenances',
            'nextMaintenanceCode',
            'lastUpdatedLabel'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        MaintenanceRecord::create([
            'maintenance_code' => $validated['maintenance_code'],
            'tree_id' => $validated['tree_id'],
            'worker_id' => $validated['worker_id'],
            'maintenance_type' => $validated['maintenance_type'],
            'maintenance_date' => $validated['maintenance_date'],
            'notes' => $validated['notes'] ?? null,
            'created_by' => $request->user()->id,
        ]);

        return redirect()
            ->route('pemilik.perawatan')
            ->with('success', 'Perawatan ' . $validated['maintenance_code'] . ' berhasil disimpan.');
    }

    public function update(Request $request, MaintenanceRecord $maintenance): RedirectResponse
    {
        $validated = $request->validate($this->rules($maintenance));

        $maintenance->update([
            'maintenance_code' => $validated['maintenance_code'],
            'tree_id' => $validated['tree_id'],
            'worker_id' => $validated['worker_id'],
            'maintenance_type' => $validated['maintenance_type'],
            'maintenance_date' => $validated['maintenance_date'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('pemilik.perawatan')
            ->with('success', 'Perawatan ' . $maintenance->maintenance_code . ' berhasil diperbarui.');
    }

    public function destroy(MaintenanceRecord $maintenance): RedirectResponse
    {
        $code = $maintenance->maintenance_code;
        $maintenance->delete();

        return redirect()
            ->route('pemilik.perawatan')
            ->with('success', 'Perawatan ' . $code . ' berhasil dihapus.');
    }

    private function rules(?MaintenanceRecord $maintenance = null): array
    {
        return [
            'maintenance_code' => [
                'required',
                'string',
                'max:40',
                Rule::unique('maintenance_records', 'maintenance_code')->ignore($maintenance?->id),
            ],
            'tree_id' => ['required', 'integer', Rule::exists('trees', 'id')],
            'worker_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where(fn ($query) => $query->where('role', 'pekerja')),
            ],
            'maintenance_type' => [
                'required',
                Rule::in(['Pemupukan NPK', 'Pruning', 'Pest Control', 'Sanitation']),
            ],
            'maintenance_date' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:3000'],
        ];
    }
}
