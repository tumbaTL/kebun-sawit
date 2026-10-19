<?php

namespace App\Http\Controllers;

use App\Models\WorkReport;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VerifikasiLaporanPekerjaanController extends Controller
{
    public function index(): View
    {
        $reports = WorkReport::query()
            ->with(['worker:id,name', 'verifier:id,name'])
            ->orderByDesc('work_date')
            ->orderByDesc('id')
            ->paginate(10);

        return view('dashboard.verifikasi-laporan-pekerjaan', [
            'reports' => $reports,
            'totalReports' => WorkReport::query()->count(),
            'pendingReports' => WorkReport::query()->where('status_verification', 'Menunggu')->count(),
            'approvedReports' => WorkReport::query()->where('status_verification', 'Disetujui')->count(),
            'rejectedReports' => WorkReport::query()->where('status_verification', 'Ditolak')->count(),
        ]);
    }

    public function approve(Request $request, WorkReport $workReport): RedirectResponse
    {
        $validated = $request->validate([
            'catatan_verifikasi' => ['nullable', 'string', 'max:2000'],
        ]);

        $updated = DB::transaction(function () use ($request, $workReport, $validated): bool {
            $report = WorkReport::query()->whereKey($workReport->id)->lockForUpdate()->firstOrFail();

            if ($report->status_verification !== 'Menunggu') {
                return false;
            }

            $note = trim((string) ($validated['catatan_verifikasi'] ?? ''));

            $report->update([
                'status_verification' => 'Disetujui',
                'verified_by' => $request->user()->id,
                'verified_at' => now(),
                'verification_notes' => $note !== '' ? $note : null,
            ]);

            return true;
        });

        if (!$updated) {
            return redirect()->route('pemilik.verifikasi-laporan')
                ->with('error', 'Laporan ini sudah pernah diverifikasi.');
        }

        return redirect()->route('pemilik.verifikasi-laporan')
            ->with('success', 'Laporan ' . $workReport->report_code . ' berhasil disetujui.');
    }

    public function reject(Request $request, WorkReport $workReport): RedirectResponse
    {
        $validated = $request->validate([
            'catatan_verifikasi' => ['required', 'string', 'min:3', 'max:2000'],
        ], [
            'catatan_verifikasi.required' => 'Alasan penolakan wajib diisi.',
            'catatan_verifikasi.min' => 'Alasan penolakan minimal 3 karakter.',
        ]);

        $updated = DB::transaction(function () use ($request, $workReport, $validated): bool {
            $report = WorkReport::query()->whereKey($workReport->id)->lockForUpdate()->firstOrFail();

            if ($report->status_verification !== 'Menunggu') {
                return false;
            }

            $report->update([
                'status_verification' => 'Ditolak',
                'verified_by' => $request->user()->id,
                'verified_at' => now(),
                'verification_notes' => trim($validated['catatan_verifikasi']),
            ]);

            return true;
        });

        if (!$updated) {
            return redirect()->route('pemilik.verifikasi-laporan')
                ->with('error', 'Laporan ini sudah pernah diverifikasi.');
        }

        return redirect()->route('pemilik.verifikasi-laporan')
            ->with('success', 'Laporan ' . $workReport->report_code . ' ditolak dan alasannya disimpan.');
    }

    /**
     * Foto tetap berada di disk local/private. Hanya staf terautentikasi
     * yang lolos middleware route yang dapat melihat foto dari halaman ini.
     */
    public function photo(WorkReport $workReport, int $photoIndex)
    {
        $paths = $workReport->photo_paths ?? [];
        $path = $paths[$photoIndex] ?? null;

        abort_unless(
            is_string($path)
            && str_starts_with($path, 'laporan-pekerjaan/')
            && !str_contains($path, '..'),
            404
        );

        $disk = Storage::disk('local');
        abort_unless($disk->exists($path), 404);

        $mime = $disk->mimeType($path) ?: 'application/octet-stream';
        abort_unless(in_array($mime, ['image/jpeg', 'image/png'], true), 404);

        return response()->file($disk->path($path), [
            'Content-Type' => $mime,
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
