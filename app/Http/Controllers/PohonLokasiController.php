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
     * Menampilkan data pohon dari database.
     */
    public function index()
    {
        $trees = Tree::with('block')
            ->latest()
            ->paginate(10);

        $totalTrees = Tree::count();

        $averageAge = (int) round(
            (float) (Tree::avg('age_months') ?? 0)
        );

        $totalBlocks = Block::count();

        $healthyCount = Tree::where('condition', 'Sehat')->count();
        $healthyPercentage = $totalTrees > 0
            ? (int) round(($healthyCount / $totalTrees) * 100)
            : 0;

        return view('dashboard.pohon-lokasi', compact(
            'trees',
            'totalTrees',
            'averageAge',
            'totalBlocks',
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
}
