@extends('layouts.app')

@section('title', 'Ajukan Surat Online')
@section('page_title', 'Permohonan Surat Baru')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulir Pengajuan</h3>
            </div>
            
            <form action="{{ route('warga.surat.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat" class="form-control" required>
                            <option value="">-- Pilih Dokumen --</option>
                            <option value="Surat Keterangan Serbaguna">Surat Keterangan Serbaguna</option>
                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                        </select>
                    </div>

                    <div id="form_serbaguna" style="display: none;" class="mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="nik" id="input_nik" class="form-control" placeholder="1905xxxxxxxxxxxx">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" id="input_nama" class="form-control" placeholder="Nama sesuai KTP">
                                </div>
                                <div class="form-group">
                                    <label>Tempat, Tanggal Lahir</label>
                                    <input type="text" name="ttl" id="input_ttl" class="form-control" placeholder="Contoh: Bandung, 07-11-1998">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="text" name="agama" id="input_agama" class="form-control" placeholder="Contoh: Islam">
                                </div>
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select name="status_perkawinan" class="form-control">
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai">Cerai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" id="input_pekerjaan" class="form-control" placeholder="Contoh: Belum/Tidak Bekerja">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat" id="input_alamat" class="form-control" rows="2" placeholder="Kp. Cibaros Rt 001 Rw 007..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label>Keperluan / Tujuan Pembuatan Surat</label>
                            <input type="text" name="keperluan" id="input_keperluan" class="form-control" placeholder="Contoh: Mengganti Kartu Tanda Penduduk">
                        </div>
                    </div>

                    <div id="form_domisili" style="display: none;" class="mt-3">
                        <div class="form-group">
                            <label>Alamat Lengkap Domisili Sekarang</label>
                            <textarea name="alamat_domisili" id="input_alamat_domisili" class="form-control" rows="3" placeholder="Contoh: Jl. Merdeka No. 12, RT 03/RW 02"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Keperluan Pembuatan</label>
                            <input type="text" name="keperluan_domisili" id="input_keperluan_domisili" class="form-control" placeholder="Contoh: Pembukaan Rekening Bank">
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim Pengajuan</button>
                    <a href="{{ route('warga.dashboard') }}" class="btn btn-default">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('jenis_surat').addEventListener('change', function () {
        var formDomisili = document.getElementById('form_domisili');
        var formSerbaguna = document.getElementById('form_serbaguna');
        
        // Elemen input untuk handling 'required' dinamis
        var inputsSerbaguna = ['input_nik', 'input_nama', 'input_ttl', 'input_agama', 'input_pekerjaan', 'input_alamat', 'input_keperluan'];
        var inputsDomisili = ['input_alamat_domisili', 'input_keperluan_domisili'];

        // Sembunyikan semua & matikan required
        formDomisili.style.display = 'none';
        formSerbaguna.style.display = 'none';
        
        inputsSerbaguna.forEach(id => document.getElementById(id).required = false);
        inputsDomisili.forEach(id => document.getElementById(id).required = false);
        
        // Tampilkan yang dipilih & aktifkan required
        if (this.value === 'Surat Keterangan Domisili') {
            formDomisili.style.display = 'block';
            inputsDomisili.forEach(id => document.getElementById(id).required = true);
        } else if (this.value === 'Surat Keterangan Serbaguna') {
            formSerbaguna.style.display = 'block';
            inputsSerbaguna.forEach(id => document.getElementById(id).required = true);
        }
    });
</script>
@endsection