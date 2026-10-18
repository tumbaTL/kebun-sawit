<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelolaJadwalController extends Controller
{
    public function index(Request $request)
    {
        $schedules = MaintenanceSchedule::with('worker')
            ->orderBy('schedule_date')
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        $workers = User::query()
            ->where('role', 'pekerja')
            ->orderBy('name')
            ->get(['id', 'name']);

        if ($request->boolean('new')) {
            $selectedSchedule = null;
        } elseif ($request->filled('schedule')) {
            $selectedSchedule = MaintenanceSchedule::with('worker')
                ->findOrFail($request->integer('schedule'));
        } else {
            $selectedSchedule = $schedules->first();
        }

        $scheduleDates = MaintenanceSchedule::query()
            ->pluck('schedule_date')
            ->map(fn($date) => (string) $date)
            ->values()
            ->all();

        $calendarMonth = $request->query('month', now()->format('Y-m'));
        if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $calendarMonth)) {
            $calendarMonth = now()->format('Y-m');
        }

        return view('dashboard.jadwal', [
            'schedules' => $schedules,
            'workers' => $workers,
            'selectedSchedule' => $selectedSchedule,
            'nextScheduleCode' => $this->generateScheduleCode(),
            'scheduleDates' => $scheduleDates,
            'calendarMonth' => $calendarMonth,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->messages());
        $scheduleCode = $this->generateScheduleCode();

        $schedule = MaintenanceSchedule::create([
            'schedule_code' => $scheduleCode,
            'activity' => trim($validated['activity']),
            'schedule_date' => $validated['schedule_date'],
            'location' => trim($validated['location']),
            'worker_id' => $validated['worker_id'],
            'status' => $validated['status'],
            'notes' => isset($validated['notes']) ? trim($validated['notes']) : null,
            'created_by' => $request->user()->id,
        ]);

        return redirect()
            ->route('pemilik.jadwal', ['schedule' => $schedule->id])
            ->with('success', 'Jadwal ' . $schedule->schedule_code . ' berhasil ditambahkan.');
    }

    public function update(Request $request, MaintenanceSchedule $maintenanceSchedule)
    {
        $validated = $request->validate($this->rules(), $this->messages());

        $maintenanceSchedule->update([
            'activity' => trim($validated['activity']),
            'schedule_date' => $validated['schedule_date'],
            'location' => trim($validated['location']),
            'worker_id' => $validated['worker_id'],
            'status' => $validated['status'],
            'notes' => isset($validated['notes']) ? trim($validated['notes']) : null,
        ]);

        return redirect()
            ->route('pemilik.jadwal', ['schedule' => $maintenanceSchedule->id])
            ->with('success', 'Jadwal ' . $maintenanceSchedule->schedule_code . ' berhasil diperbarui.');
    }

    public function destroy(MaintenanceSchedule $maintenanceSchedule)
    {
        $code = $maintenanceSchedule->schedule_code;
        $maintenanceSchedule->delete();

        return redirect()
            ->route('pemilik.jadwal')
            ->with('success', 'Jadwal ' . $code . ' berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'activity' => ['required', 'string', 'max:150'],
            'schedule_date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:150'],
            'worker_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where('role', 'pekerja'),
            ],
            'status' => ['required', Rule::in(['Terjadwal', 'Dalam Proses', 'Selesai', 'Mendesak'])],
            'notes' => ['nullable', 'string', 'max:3000'],
        ];
    }

    private function messages(): array
    {
        return [
            'activity.required' => 'Kegiatan wajib diisi.',
            'schedule_date.required' => 'Tanggal jadwal wajib diisi.',
            'location.required' => 'Lokasi wajib diisi.',
            'worker_id.required' => 'Pilih pekerja untuk jadwal ini.',
            'worker_id.exists' => 'Pekerja yang dipilih tidak valid.',
            'status.required' => 'Pilih status jadwal.',
        ];
    }

    private function generateScheduleCode(): string
    {
        $year = now()->format('Y');
        $sequence = 1;

        do {
            $code = sprintf('SCH-%s-%03d', $year, $sequence);
            $sequence++;
        } while (MaintenanceSchedule::where('schedule_code', $code)->exists());

        return $code;
    }
}