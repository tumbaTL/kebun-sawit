<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Tree;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PohonLokasiController extends Controller
{
    /**
     * Menampilkan data pohon dari database dengan filter dan paginasi fleksibel.
     */
    public function index(Request $request)
    {
        $perPage = in_array((int) $request->input('per_page'), [10, 25, 50, 100], true)
            ? (int) $request->input('per_page')
            : 25;

        $search = trim((string) $request->input('search', ''));
        $blockFilter = $request->input('block_id');
        $conditionFilter = $request->input('condition');

        $query = Tree::with('block')->orderBy('tree_code');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('tree_code', 'like', "%{$search}%")
                  ->orWhere('condition', 'like', "%{$search}%")
                  ->orWhere('maintenance_status', 'like', "%{$search}%")
                  ->orWhereHas('block', function ($b) use ($search) {
                      $b->where('name', 'like', "%{$search}%")
                        ->orWhere('block_code', 'like', "%{$search}%");
                  });
            });
        }

        if (!empty($blockFilter)) {
            $query->where('block_id', $blockFilter);
        }

        if (!empty($conditionFilter)) {
            $query->where('condition', $conditionFilter);
        }

        $trees = $query->paginate($perPage)->withQueryString();

        $totalTrees = Tree::count();
        $averageAge = (int) round((float) (Tree::avg('age_months') ?? 0));
        $totalBlocks = Block::count();

        $healthyCount = Tree::where('condition', 'Sehat')->count();
        $recoveryCount = Tree::where('condition', 'Pemulihan')->count();
        $urgentCount = Tree::where('condition', 'Urgent')->count();

        $healthyPercentage = $totalTrees > 0
            ? (int) round(($healthyCount / $totalTrees) * 100)
            : 0;

        $blocks = Block::where('is_active', true)->orderBy('name')->get();

        return view('dashboard.pohon-lokasi', compact(
            'trees',
            'blocks',
            'totalTrees',
            'averageAge',
            'totalBlocks',
            'healthyCount',
            'recoveryCount',
            'urgentCount',
            'healthyPercentage'
        ));
    }

    /**
     * Menyimpan pohon baru ke database.
     */
    public function store(Request $request)
    {
        $request->merge([
            'tree_code' => strtoupper(
                trim((string) $request->input('tree_code'))
            ),
            'location' => trim(
                (string) $request->input('location')
            ),
        ]);

        $validated = $request->validate([
            'tree_code' => [
                'required',
                'string',
                'max:50',
                'unique:trees,tree_code',
            ],
            'location' => [
                'required',
                'string',
                'max:100',
            ],
            'age_months' => [
                'required',
                'integer',
                'min:0',
                'max:65535',
            ],
            'condition' => [
                'required',
                Rule::in(['Sehat', 'Urgent', 'Pemulihan']),
            ],
            'maintenance_status' => [
                'required',
                Rule::in([
                    'Terkendali',
                    'Jadwal Mendatang',
                    'Terlambat',
                ]),
            ],
        ], [
            'tree_code.required' => 'ID pohon wajib diisi.',
            'tree_code.unique' => 'ID pohon tersebut sudah terdaftar.',
            'location.required' => 'Lokasi atau blok wajib diisi.',
            'age_months.required' => 'Umur pohon wajib diisi.',
            'condition.required' => 'Kondisi pohon wajib dipilih.',
            'maintenance_status.required' => 'Status perawatan wajib dipilih.',
        ]);

        $blockName = $validated['location'];
        $blockCode = strtoupper(Str::slug($blockName, '-'));

        if ($blockCode === '') {
            return back()
                ->withInput()
                ->withErrors([
                    'location' => 'Nama lokasi tidak valid.',
                ]);
        }

        $blockCode = Str::limit($blockCode, 30, '');

        $block = Block::firstOrCreate(
            ['block_code' => $blockCode],
            [
                'name' => $blockName,
                'is_active' => true,
            ]
        );

        $tree = Tree::create([
            'tree_code' => $validated['tree_code'],
            'block_id' => $block->id,
            'age_months' => $validated['age_months'],
            'condition' => $validated['condition'],
            'maintenance_status' => $validated['maintenance_status'],
        ]);

        return redirect()
            ->route('pemilik.pohon-lokasi')
            ->with('success', 'Data pohon ' . $tree->tree_code . ' berhasil disimpan.');
    }
    public function update(Request $request, Tree $tree)
    {
        $validated = $request->validate([
            'age_months' => ['required', 'integer', 'min:0', 'max:65535'],
            'condition' => ['required', Rule::in(['Sehat', 'Urgent', 'Pemulihan'])],
            'maintenance_status' => [
                'required',
                Rule::in(['Terkendali', 'Jadwal Mendatang', 'Terlambat']),
            ],
        ]);

        $tree->update($validated);

        return redirect()
            ->route('pemilik.pohon-lokasi')
            ->with('success', 'Data pohon ' . $tree->tree_code . ' berhasil diperbarui.');
    }
}