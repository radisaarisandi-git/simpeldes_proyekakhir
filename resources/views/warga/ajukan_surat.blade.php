@extends('layouts.app')

@section('title', 'Ajukan Surat Online')
@section('page_title', 'Permohonan Surat Baru')

@section('content')

<div class="row">

    <div class="col-lg-10 mx-auto">

        {{-- Header --}}
        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex align-items-center">

                    <div class="mr-3">

                        <span class="bg-primary rounded-circle p-3 d-inline-block">

                            <i class="fas fa-file-signature text-white fa-2x"></i>

                        </span>

                    </div>

                    <div>

                        <h3 class="mb-1 font-weight-bold">
                            Permohonan Surat Online
                        </h3>

                        <p class="text-muted mb-0">
                            Silakan lengkapi data sesuai identitas asli.
                            Pastikan seluruh informasi yang dimasukkan benar sebelum dikirim.
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- Informasi --}}
        <div class="alert alert-info">

            <i class="fas fa-info-circle"></i>

            Seluruh layanan surat diproses secara online.
            Estimasi penyelesaian <strong>1 Hari Kerja</strong>.

        </div>


        <div class="card card-primary shadow">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-edit"></i>

                    Formulir Pengajuan Surat

                </h3>

            </div>

            <form action="{{ route('warga.surat.store') }}" method="POST">

                @csrf

                <div class="card-body">

                    <div class="form-group">

                        <label>Pilih Jenis Surat</label>

                        <select name="jenis_surat"
                                id="jenis_surat"
                                class="form-control"
                                required>

                            <option value="">-- Pilih Dokumen --</option>

                            <option value="Surat Keterangan Serbaguna">
                                Surat Keterangan Serbaguna
                            </option>

                            <option value="Surat Keterangan Domisili">
                                Surat Keterangan Domisili
                            </option>

                            <option value="Surat Keterangan Usaha">
                                Surat Keterangan Usaha
                            </option>

                            <option value="Surat Keterangan Tidak Mampu">
                                Surat Keterangan Tidak Mampu (SKTM)
                            </option>

                            <option value="Surat Pengantar KTP">
                                Surat Pengantar KTP
                            </option>

                            <option value="Surat Pengantar KK">
                                Surat Pengantar KK
                            </option>

                        </select>

                    </div>

                    {{-- FORM SERBAGUNA --}}
                    <div id="form_serbaguna" style="display:none;">

                        <div class="card card-outline card-primary">

                            <div class="card-header">

                                <h5 class="mb-0">
                                    <i class="fas fa-file-alt"></i>
                                    Surat Keterangan Serbaguna
                                </h5>

                            </div>

                            <div class="card-body">

                                <div class="alert alert-info">

                                    <i class="fas fa-info-circle"></i>
                                    <strong>Informasi</strong><br>
                                    Data identitas pemohon akan diambil otomatis dari data kependudukan yang telah didaftarkan.

                                </div>

                                <div class="form-group">

                                    <label>Keperluan Surat <span class="text-danger">*</span></label>

                                    <textarea
                                        name="keperluan"
                                        id="input_keperluan"
                                        rows="4"
                                        class="form-control"
                                        placeholder="Contoh : Persyaratan Beasiswa, Melamar Pekerjaan, Pembukaan Rekening Bank, dll."></textarea>

                                </div>

                                <div class="form-group">

                                    <label>Keterangan Tambahan <small class="text-muted">(Opsional)</small></label>

                                    <textarea
                                        name="keterangan_serbaguna"
                                        id="input_keterangan_serbaguna"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Tambahkan keterangan jika diperlukan..."></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- FORM USAHA --}}
                    <div id="form_usaha" style="display:none;">

                        <div class="card card-outline card-warning">

                            <div class="card-header">

                                <h5 class="mb-0">

                                    <i class="fas fa-store"></i>

                                    Data Usaha

                                </h5>

                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Nama Usaha</label>

                                    <input
                                        type="text"
                                        name="nama_usaha"
                                        id="input_nama_usaha"
                                        class="form-control"
                                        placeholder="Contoh : Toko Sembako Maju">

                                </div>

                                <div class="form-group">

                                    <label>Jenis Usaha</label>

                                    <input
                                        type="text"
                                        name="jenis_usaha"
                                        id="input_jenis_usaha"
                                        class="form-control"
                                        placeholder="Contoh : Perdagangan">

                                </div>

                                <div class="form-group">

                                    <label>Alamat Usaha</label>

                                    <textarea
                                        name="alamat_usaha"
                                        id="input_alamat_usaha"
                                        rows="3"
                                        class="form-control"></textarea>

                                </div>

                                <div class="form-group">

                                    <label>Lama Usaha</label>

                                    <input
                                        type="text"
                                        name="lama_usaha"
                                        id="input_lama_usaha"
                                        class="form-control"
                                        placeholder="Contoh : 3 Tahun">

                                </div>

                                <div class="form-group">

                                    <label>Keperluan</label>

                                    <textarea
                                        name="keperluan_usaha"
                                        id="input_keperluan_usaha"
                                        rows="3"
                                        class="form-control"></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- FORM SKTM --}}
                    <div id="form_sktm" style="display:none;">

                        <div class="card card-outline card-danger">

                            <div class="card-header">

                                <h5 class="mb-0">

                                    <i class="fas fa-heart"></i>

                                    Data SKTM

                                </h5>

                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Penghasilan per Bulan</label>

                                    <input
                                        type="number"
                                        name="penghasilan"
                                        id="input_penghasilan"
                                        class="form-control"
                                        placeholder="Contoh : 1500000">

                                </div>

                                <div class="form-group">

                                    <label>Jumlah Tanggungan</label>

                                    <input
                                        type="number"
                                        name="jumlah_tanggungan"
                                        id="input_tanggungan"
                                        class="form-control"
                                        placeholder="Contoh : 3">

                                </div>

                                <div class="form-group">

                                    <label>Keperluan</label>

                                    <textarea
                                        name="keperluan_sktm"
                                        id="input_keperluan_sktm"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Contoh : Pengajuan Beasiswa"></textarea>

                                </div>

                                <div class="form-group">

                                    <label>Keterangan Tambahan</label>

                                    <textarea
                                        name="keterangan_sktm"
                                        id="input_keterangan_sktm"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Opsional"></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- FORM PENGANTAR KTP --}}
                    <div id="form_ktp" style="display:none;">

                        <div class="card card-outline card-info">

                            <div class="card-header">

                                <h5 class="mb-0">

                                    <i class="fas fa-id-card"></i>

                                    Pengajuan KTP

                                </h5>

                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Jenis Pengajuan</label>

                                    <select
                                        name="jenis_pengajuan_ktp"
                                        id="input_jenis_pengajuan_ktp"
                                        class="form-control">

                                        <option value="">-- Pilih --</option>
                                        <option value="Pembuatan Baru">Pembuatan Baru</option>
                                        <option value="Perpanjangan">Perpanjangan</option>
                                        <option value="Rusak">Rusak</option>
                                        <option value="Hilang">Hilang</option>

                                    </select>

                                </div>

                                <div class="form-group">

                                    <label>Alasan Pengajuan</label>

                                    <textarea
                                        name="alasan_ktp"
                                        id="input_alasan_ktp"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Tuliskan alasan pengajuan"></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- FORM PENGANTAR KK --}}
                    <div id="form_kk" style="display:none;">

                        <div class="card card-outline card-primary">

                            <div class="card-header">

                                <h5 class="mb-0">

                                    <i class="fas fa-users"></i>

                                    Pengajuan Kartu Keluarga (KK)

                                </h5>

                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Jenis Pengajuan KK</label>

                                    <select
                                        name="jenis_pengajuan_kk"
                                        id="input_jenis_pengajuan_kk"
                                        class="form-control">

                                        <option value="">-- Pilih Jenis Pengajuan --</option>
                                        <option value="KK Baru">KK Baru</option>
                                        <option value="Penambahan Anggota Keluarga">Penambahan Anggota Keluarga</option>
                                        <option value="Pengurangan Anggota Keluarga">Pengurangan Anggota Keluarga</option>
                                        <option value="Perubahan Data KK">Perubahan Data KK</option>
                                        <option value="KK Hilang/Rusak">KK Hilang / Rusak</option>

                                    </select>

                                </div>

                                <div class="form-group">

                                    <label>Alasan Pengajuan</label>

                                    <textarea
                                        name="alasan_kk"
                                        id="input_alasan_kk"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Tuliskan alasan pengajuan"></textarea>

                                </div>

                                <div class="form-group">

                                    <label>Keterangan Tambahan</label>

                                    <textarea
                                        name="keterangan_kk"
                                        id="input_keterangan_kk"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Opsional"></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- FORM DOMISILI --}}
                    <div id="form_domisili" style="display:none;">

                        <div class="card card-outline card-success">

                            <div class="card-header">

                                <h5 class="mb-0">

                                    <i class="fas fa-home"></i>

                                    Data Domisili

                                </h5>

                            </div>

                            <div class="card-body">

                                <div class="form-group">

                                    <label>Alamat Lengkap Domisili Sekarang</label>

                                    <textarea
                                        name="alamat_domisili"
                                        id="input_alamat_domisili"
                                        rows="4"
                                        class="form-control"
                                        placeholder="Contoh : Jl. Merdeka No.12 RT 03 RW 02"></textarea>

                                </div>

                                <div class="form-group">

                                    <label>Keperluan Pembuatan Surat</label>

                                    <textarea
                                        name="keperluan_domisili"
                                        id="input_keperluan_domisili"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Contoh : Pembukaan Rekening Bank"></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer">

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('warga.dashboard') }}"
                           class="btn btn-secondary">

                            <i class="fas fa-arrow-left"></i>

                            Kembali

                        </a>

                        <button type="submit"
                                class="btn btn-success px-4">

                            <i class="fas fa-paper-plane"></i>

                            Kirim Pengajuan

                        </button>

                    </div>

                </div>

            </form>

        </div>

        <div class="card mt-4">

            <div class="card-header bg-light">

                <h5 class="mb-0">

                    <i class="fas fa-info-circle text-primary"></i>

                    Informasi Penting

                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4">

                        <div class="info-box">

                            <span class="info-box-icon bg-primary">

                                <i class="fas fa-user-check"></i>

                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">

                                    Data Valid

                                </span>

                                <span class="info-box-number">

                                    Sesuai KTP

                                </span>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="info-box">

                            <span class="info-box-icon bg-success">

                                <i class="fas fa-clock"></i>

                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">

                                    Estimasi

                                </span>

                                <span class="info-box-number">

                                    1 Hari Kerja

                                </span>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="info-box">

                            <span class="info-box-icon bg-warning">

                                <i class="fas fa-file-alt"></i>

                            </span>

                            <div class="info-box-content">

                                <span class="info-box-text">

                                    Layanan

                                </span>

                                <span class="info-box-number">

                                    Gratis

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const selectJenis = document.getElementById('jenis_surat');
const formDomisili = document.getElementById('form_domisili');
const formSerbaguna = document.getElementById('form_serbaguna');
const formUsaha = document.getElementById('form_usaha');
const formKTP = document.getElementById('form_ktp');
const formKK = document.getElementById('form_kk');
const formSKTM = document.getElementById('form_sktm');

const inputsSerbaguna = [
    'input_keperluan'
];

const inputsDomisili = [
'input_alamat_domisili',
'input_keperluan_domisili'
];

const inputsUsaha = [
'input_nama_usaha',
'input_jenis_usaha',
'input_alamat_usaha',
'input_lama_usaha',
'input_keperluan_usaha'
];

const inputsSKTM = [
'input_penghasilan',
'input_tanggungan',
'input_keperluan_sktm'
];

const inputsKTP = [
'input_jenis_pengajuan_ktp',
'input_alasan_ktp'
];

const inputsKK = [
'input_jenis_pengajuan_kk',
'input_alasan_kk'
];

function tampilkanForm(){

    formDomisili.style.display='none';
    formSerbaguna.style.display='none';
    formUsaha.style.display='none';
    formSKTM.style.display='none';
    formKTP.style.display='none';
    formKK.style.display='none';

    inputsSerbaguna.forEach(id=>{
        document.getElementById(id).required=false;
    });

    inputsDomisili.forEach(id=>{
        document.getElementById(id).required=false;
    });

    inputsUsaha.forEach(id=>{
    document.getElementById(id).required=false;
    });

    inputsSKTM.forEach(id=>{
    document.getElementById(id).required=false;
    });

    inputsKTP.forEach(id=>{
    document.getElementById(id).required=false;
    });

    inputsKK.forEach(id=>{
    document.getElementById(id).required=false;
    });

    if(selectJenis.value==="Surat Keterangan Domisili"){

        formDomisili.style.display='block';

        inputsDomisili.forEach(id=>{
            document.getElementById(id).required=true;
        });

    }

    if(selectJenis.value==="Surat Keterangan Serbaguna"){

        formSerbaguna.style.display='block';

        inputsSerbaguna.forEach(id=>{
            document.getElementById(id).required=true;
        });

    }

    if(selectJenis.value==="Surat Keterangan Usaha"){

        formUsaha.style.display='block';

        inputsUsaha.forEach(id=>{
            document.getElementById(id).required=true;
        });

    }

    if(selectJenis.value==="Surat Keterangan SKTM"){

        formSKTM.style.display='block';

        inputsSKTM.forEach(id=>{
            document.getElementById(id).required=true;
        });

    }

    if(selectJenis.value==="Surat Keterangan Tidak Mampu"){

        formSKTM.style.display='block';

        inputsSKTM.forEach(id=>{
            document.getElementById(id).required=true;
        });
    }

    if(selectJenis.value==="Surat Pengantar KTP"){

        formKTP.style.display='block';

        inputsKTP.forEach(id=>{
            document.getElementById(id).required=true;
        });

    }

    if(selectJenis.value==="Surat Pengantar KK"){

        formKK.style.display='block';

        inputsKK.forEach(id=>{
            document.getElementById(id).required=true;
        });

    }

}

selectJenis.addEventListener('change', tampilkanForm);

window.onload=function(){

@if(isset($jenis))

@if($jenis=='domisili')

selectJenis.value="Surat Keterangan Domisili";

@elseif($jenis=='serbaguna')

selectJenis.value="Surat Keterangan Serbaguna";

@endif

@endif

tampilkanForm();

};

</script>

@endsection