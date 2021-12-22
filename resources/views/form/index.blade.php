@extends('layouts.app')

@section('title')
    @if (isset($data))
        {{ "Formulir $data->id" }}
        @if ($data->status == 'menunggu')
            <span class="badge badge-secondary">Menunggu</span>
        @elseif ($data->status == 'diterima')
            <span class="badge badge-primary">Diterima</span>
        @elseif ($data->status == 'dicadangkan')
            <span class="badge badge-warning">dicadangkan</span>
        @elseif ($data->status == 'tidak diterima')
            <span class="badge badge-danger">Tidak Diterima</span>
        @endif
    @else
        {{ 'Formulir' }}
    @endif
@endsection
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4>Data Pribadi</h4>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn"
                                {{ isset($data) ? "value=$data->nisn disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah"
                                {{ isset($data) ? "value=$data->asal_sekolah disabled" : '' }}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="custom-select" {{ isset($data) ? 'disabled' : '' }}>
                                <option value="" disabled selected></option>
                                <option value="islam"
                                    {{ isset($data) ? ($data->agama == 'islam' ? 'selected' : '') : '' }}>
                                    Islam</option>
                                <option value="kristen"
                                    {{ isset($data) ? ($data->agama == 'kristen' ? 'selected' : '') : '' }}>Kristen
                                </option>
                                <option value="katolik"
                                    {{ isset($data) ? ($data->agama == 'katolik' ? 'selected' : '') : '' }}>Katolik
                                </option>
                                <option value="hindu"
                                    {{ isset($data) ? ($data->agama == 'hindu' ? 'selected' : '') : '' }}>Hindu</option>
                                <option value="buddha"
                                    {{ isset($data) ? ($data->agama == 'buddha' ? 'selected' : '') : '' }}>Buddha
                                </option>
                                <option value="konghucu"
                                    {{ isset($data) ? ($data->agama == 'konghucu' ? 'selected' : '') : '' }}>Konghucu
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select"
                                {{ isset($data) ? 'disabled' : '' }}>
                                <option value="" disabled selected></option>
                                <option value="L"
                                    {{ isset($data) ? ($data->jenis_kelamin == 'L' ? 'selected' : '') : '' }}>Laki-Laki
                                </option>
                                <option value="P"
                                    {{ isset($data) ? ($data->jenis_kelamin == 'P' ? 'selected' : '') : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                {{ isset($data) ? "value=$data->tempat_lahir disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jenis_kelamin">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="jenis_kelamin" name="tanggal_lahir"
                                {{ isset($data) ? "value=$data->tanggal_lahir disabled" : '' }}>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telp.</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                        {{ isset($data) ? "value=$data->no_telp disabled" : '' }}>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        {{ isset($data) ? "value=$data->alamat disabled" : '' }}>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="kp">Kp.</label>
                            <input type="text" class="form-control" id="kp" name="kp"
                                {{ isset($data) ? "value=$data->kp disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" class="form-control" id="rt" name="rt"
                                {{ isset($data) ? "value=$data->rt disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" id="rw" name="rw"
                                {{ isset($data) ? "value=$data->rw disabled" : '' }}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                {{ isset($data) ? "value=$data->kecamatan disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="kab_kota">Kabupaten / Kota</label>
                            <input type="text" class="form-control" id="kab_kota" name="kab_kota"
                                {{ isset($data) ? "value=$data->kecamatan disabled" : '' }}>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Data Orang Tua / Wali</h4>
                <hr>
                <div class="form-group">
                    <label for="nama_ortu_wali">Nama Orang Tua / Wali</label>
                    <input type="text" class="form-control" id="nama_ortu_wali" name="nama_ortu_wali"
                        {{ isset($data) ? "value=$data->nama_ortu_wali disabled" : '' }}>
                </div>
                <div class="form-group">
                    <label for="pekerjaan_ortu_wali">Pekerjaan Orang Tua / Wali</label>
                    <input type="text" class="form-control" id="pekerjaan_ortu_wali" name="pekerjaan_ortu_wali"
                        {{ isset($data) ? "value=$data->pekerjaan_ortu_wali disabled" : '' }}>
                </div>
                <hr>
                <h4>Nilai</h4>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nilai_mtk">Matematika</label>
                            <input type="number" min="1" class="form-control" id="nilai_mtk" name="nilai_mtk"
                                {{ isset($data) ? "value=$data->nilai_mtk disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nilai_indo">Bahasa Indonesia</label>
                            <input type="number" min="1" class="form-control" id="nilai_indo" name="nilai_indo"
                                {{ isset($data) ? "value=$data->nilai_indo disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nilai_ing">Bahasa Inggris</label>
                            <input type="number" min="1" class="form-control" id="nilai_ing" name="nilai_ing"
                                {{ isset($data) ? "value=$data->nilai_ing disabled" : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nilai_ipa">IPA</label>
                            <input type="number" min="1" class="form-control" id="nilai_ipa" name="nilai_ipa"
                                {{ isset($data) ? "value=$data->nilai_ipa disabled" : '' }}>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Berkas</h4>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="ijazah_skhun">Ijazah / SKHUN</label>
                            <input type="file" id="ijazah_skhun" accept="image/jpeg,image/png,application/pdf"
                                name="doc_ijazah_skhun" {{ isset($data) ? 'disabled' : '' }}>
                            @if (isset($data))
                                <a href="{{ asset("storage/$data->ijazah_skhun") }}" target="_blank">Lihat </a>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="akta">Akta Kelahiran</label>
                            <input type="file" id="akta" accept="image/jpeg,image/png,application/pdf" name="doc_akta"
                                {{ isset($data) ? 'disabled' : '' }}>
                            @if (isset($data))
                                <a href="{{ asset("storage/$data->akta") }}" target="_blank">Lihat </a>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="kk">Kartu Keluarga</label>
                            <input type="file" id="kk" accept="image/jpeg,image/png,application/pdf" name="doc_kk"
                                {{ isset($data) ? 'disabled' : '' }}>
                            @if (isset($data))
                                <a href="{{ asset("storage/$data->kk") }}" target="_blank">Lihat </a>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="custom-select" {{ isset($data) ? 'disabled' : '' }}>
                        <option value="" disabled selected></option>
                        <option value="ipa" {{ isset($data) ? ($data->jurusan == 'ipa' ? 'selected' : '') : '' }}>Ilmu
                            Pengetahuan Alam (IPA)</option>
                        <option value="ips" {{ isset($data) ? ($data->jurusan == 'ips' ? 'selected' : '') : '' }}>Ilmu
                            Pengetahuan Sosial (IPS)</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                @if (isset($data))

                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </div>
        </form>
    </div>
@endsection
@if (session()->has('success'))
    @push('script')
        <script>
            alert('Berhasil');
        </script>
    @endpush
@endif
