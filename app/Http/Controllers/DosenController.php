<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    private array $daftarJabatan = [
        'Asisten Ahli',
        'Lektor',
        'Lektor Kepala',
        'Guru Besar',
    ];

    private function rules(?Dosen $dosen = null): array
    {
        return [
            'nidn'      => ['required', 'digits:13', Rule::unique('dosen', 'nidn')->ignore($dosen?->id)],
            'nama'      => ['required', 'string', 'max:150'],
            'jabatan'   => ['required', Rule::in($this->daftarJabatan)],
            'kepakaran' => ['required', 'string', 'max:255'],
        ];
    }

    public function index()
    {
        $dosens = Dosen::orderBy('id', 'desc')->get();
        $daftarJabatan = $this->daftarJabatan;

        return view('dosen.index', compact('dosens', 'daftarJabatan'));
    }

    public function store(Request $request)
    {
        Dosen::create($request->validate($this->rules()));

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        $daftarJabatan = $this->daftarJabatan;

        return view('dosen.edit', compact('dosen', 'daftarJabatan'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $dosen->update($request->validate($this->rules($dosen)));

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}