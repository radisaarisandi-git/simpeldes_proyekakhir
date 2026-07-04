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

                        </select>

                    </div>

                    {{-- FORM SERBAGUNA --}}
                    <div id="form_serbaguna"
                         style="display:none;">

                        <div class="card card-outline card-primary">

                            <div class="card-header">

                                <h5 class="mb-0">

                                    <i class="fas fa-user"></i>

                                    Data Pemohon

                                </h5>

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>NIK</label>

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                                    <span class="input-group-text">

                                                        <i class="fas fa-id-card"></i>

                                                    </span>

                                                </div>

                                                <input
                                                    type="text"
                                                    name="nik"
                                                    id="input_nik"
                                                    class="form-control"
                                                    placeholder="1905xxxxxxxxxxxx">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label>Nama Lengkap</label>

                                            <div class="input-group">

                                                <div class="input-group-prepend">

                                                    <span class="input-group-text">

                                                        <i class="fas fa-user"></i>

                                                    </span>

                                                </div>

                                                <input
                                                    type="text"
                                                    name="nama"
                                                    id="input_nama"
                                                    class="form-control"
                                                    placeholder="Nama sesuai KTP">

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label>Tempat, Tanggal Lahir</label>

                                            <input
                                                type="text"
                                                name="ttl"
                                                id="input_ttl"
                                                class="form-control"
                                                placeholder="Contoh : Sungailiat, 10-05-2005">

                                        </div>

                                        <div class="form-group">

                                            <label>Jenis Kelamin</label>

                                            <select
                                                name="jenis_kelamin"
                                                class="form-control">

                                                <option>Laki-Laki</option>
                                                <option>Perempuan</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>Agama</label>

                                            <input
                                                type="text"
                                                name="agama"
                                                id="input_agama"
                                                class="form-control">

                                        </div>

                                        <div class="form-group">

                                            <label>Status Perkawinan</label>

                                            <select
                                                name="status_perkawinan"
                                                class="form-control">

                                                <option>Belum Kawin</option>
                                                <option>Kawin</option>
                                                <option>Cerai</option>

                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label>Pekerjaan</label>

                                            <input
                                                type="text"
                                                name="pekerjaan"
                                                id="input_pekerjaan"
                                                class="form-control">

                                        </div>

                                        <div class="form-group">

                                            <label>Alamat Lengkap</label>

                                            <textarea
                                                name="alamat"
                                                id="input_alamat"
                                                rows="3"
                                                class="form-control"></textarea>

                                        </div>

                                    </div>

                                </div>

                                <hr>

                                <div class="form-group">

                                    <label>Keperluan</label>

                                    <textarea
                                        name="keperluan"
                                        id="input_keperluan"
                                        rows="3"
                                        class="form-control"
                                        placeholder="Tuliskan tujuan pembuatan surat..."></textarea>

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

const inputsSerbaguna = [
'input_nik',
'input_nama',
'input_ttl',
'input_agama',
'input_pekerjaan',
'input_alamat',
'input_keperluan'
];

const inputsDomisili = [
'input_alamat_domisili',
'input_keperluan_domisili'
];

function tampilkanForm(){

    formDomisili.style.display='none';
    formSerbaguna.style.display='none';

    inputsSerbaguna.forEach(id=>{
        document.getElementById(id).required=false;
    });

    inputsDomisili.forEach(id=>{
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