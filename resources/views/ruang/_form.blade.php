@if ($errors->any())
  <div class="error">
    @foreach ($errors->all() as $e)
      <div>{{ $e }}</div>
    @endforeach
  </div>
@endif

<label for="nama_ruang">Nama Ruang</label>
<input type="text" id="nama_ruang" name="nama_ruang" value="{{ old('nama_ruang', $ruang->nama_ruang ?? '') }}" placeholder="Contoh: Ruang Sidang A">

<label for="gedung">Gedung</label>
<input type="text" id="gedung" name="gedung" value="{{ old('gedung', $ruang->gedung ?? '') }}" placeholder="Contoh: Gedung Utama">

<label for="proyektor">Proyektor</label>
<select id="proyektor" name="proyektor">
  @foreach (['Ada', 'Tidak Ada'] as $opt)
    <option value="{{ $opt }}" @selected(old('proyektor', $ruang->proyektor ?? 'Ada') === $opt)>{{ $opt }}</option>
  @endforeach
</select>

<label for="pc">PC</label>
<select id="pc" name="pc">
  @foreach (['Ada', 'Tidak Ada'] as $opt)
    <option value="{{ $opt }}" @selected(old('pc', $ruang->pc ?? 'Ada') === $opt)>{{ $opt }}</option>
  @endforeach
</select>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ url('/ruang') }}" class="btn btn-light">Batal</a>