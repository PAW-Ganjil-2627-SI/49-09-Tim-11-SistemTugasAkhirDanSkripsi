<?php

namespace App\Http\Controllers;

use App\Models\RuangSidang;
use Illuminate\Http\Request;

class RuangSidangController extends Controller
{
    public function index(Request $request)
    {
        // Terima ?cari=... (dipakai form sekarang) maupun ?q=... (versi lama)
        $cari = trim((string) $request->query('cari', $request->query('q', '')));

        $ruang = RuangSidang::query()
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($sub) use ($cari) {
                    $sub->where('nama_ruang', 'like', "%{$cari}%")
                        ->orWhere('gedung', 'like', "%{$cari}%");
                });
            })
            ->orderByDesc('id')
            ->get();

        return view('ruang.index', compact('ruang', 'cari'));
    }

    public function create()
    {
        return view('ruang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_ruang' => 'required|string|max:100',
            'gedung'     => 'required|string|max:100',
            'proyektor'  => 'required|in:Ada,Tidak Ada',
            'pc'         => 'required|in:Ada,Tidak Ada',
        ]);

        RuangSidang::create($data);

        return redirect()->route('ruang.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(RuangSidang $ruang)
    {
        return redirect()->route('ruang.index');
    }

    public function edit(RuangSidang $ruang)
    {
        return view('ruang.edit', compact('ruang'));
    }

    public function update(Request $request, RuangSidang $ruang)
    {
        $data = $request->validate([
            'nama_ruang' => 'required|string|max:100',
            'gedung'     => 'required|string|max:100',
            'proyektor'  => 'required|in:Ada,Tidak Ada',
            'pc'         => 'required|in:Ada,Tidak Ada',
        ]);

        $ruang->update($data);

        return redirect()->route('ruang.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(RuangSidang $ruang)
    {
        $ruang->delete();

        return redirect()->route('ruang.index')->with('success', 'Data berhasil dihapus.');
    }
}