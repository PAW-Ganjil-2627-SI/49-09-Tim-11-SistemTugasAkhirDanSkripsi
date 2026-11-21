<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    private array $daftarJabatan = ['Asisten Ahli', 'Lektor', 'Lektor Kepala', 'Guru Besar'];

    public function index()
    {
        $dosen = Dosen::orderByDesc('id')->get();
        $daftarJabatan = $this->daftarJabatan;

        return view('dosen.index', compact('dosen', 'daftarJabatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn'      => ['required', 'digits:13', 'unique:dosen,nidn'],
            'nama'      => ['required', 'string', 'max:100'],
            'jabatan'   => ['required', Rule::in($this->daftarJabatan)],
            'kepakaran' => ['required', 'string', 'max:150'],
        ]);

        Dosen::create($validated);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        $daftarJabatan = $this->daftarJabatan;

        return view('dosen.edit', compact('dosen', 'daftarJabatan'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nidn'      => ['required', 'digits:13', Rule::unique('dosen', 'nidn')->ignore($dosen->id)],
            'nama'      => ['required', 'string', 'max:100'],
            'jabatan'   => ['required', Rule::in($this->daftarJabatan)],
            'kepakaran' => ['required', 'string', 'max:150'],
        ]);

        $dosen->update($validated);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}