<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TopikController extends Controller
{
    // Pengganti index.php (bagian daftar)
    public function index()
    {
        $topik = Topik::orderByDesc('id')->get();
        $daftarBidang = Topik::BIDANG;

        return view('topik.index', compact('topik', 'daftarBidang'));
    }

    // Pengganti proses-tambah.php
    public function store(Request $request)
    {
        Topik::create($this->validasi($request));

        return redirect()->route('topik.index')
            ->with('pesan', 'Topik berhasil ditambahkan');
    }

    // Pengganti edit.php
    public function edit(Topik $topik)
    {
        $daftarBidang = Topik::BIDANG;

        return view('topik.edit', compact('topik', 'daftarBidang'));
    }

    // Pengganti proses-edit.php
    public function update(Request $request, Topik $topik)
    {
        $topik->update($this->validasi($request));

        return redirect()->route('topik.index')
            ->with('pesan', 'Topik berhasil diperbarui');
    }

    // Pengganti hapus.php
    public function destroy(Topik $topik)
    {
        $topik->delete();

        return redirect()->route('topik.index')
            ->with('pesan', 'Topik berhasil dihapus');
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama_topik'  => 'required|string|max:150',
            'bidang_ilmu' => ['required', Rule::in(Topik::BIDANG)],
            'kata_kunci'  => 'required|string|max:200',
            'deskripsi'   => 'required|string',
        ]);
    }
}
