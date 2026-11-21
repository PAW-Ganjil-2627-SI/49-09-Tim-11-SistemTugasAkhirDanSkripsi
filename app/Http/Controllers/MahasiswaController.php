<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim'       => 'required|string|max:20|unique:mahasiswa,nim',
            'nama'      => 'required|string|max:255',
            'angkatan'  => 'required|integer',
            'sks_lulus' => 'required|integer|min:0',
            'status'    => 'required|in:Aktif,Cuti,Lulus',
        ]);

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $data = $request->validate([
            'nim'       => 'required|string|max:20|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama'      => 'required|string|max:255',
            'angkatan'  => 'required|integer',
            'sks_lulus' => 'required|integer|min:0',
            'status'    => 'required|in:Aktif,Cuti,Lulus',
        ]);

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}