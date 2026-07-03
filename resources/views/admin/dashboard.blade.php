@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard Panel Admin')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Sistem</h3>
                <p>SIMPELDES Kelompok 1</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('admin.surat.index') }}" class="small-box-footer">
                Lihat Permohonan Surat <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5>Selamat Datang, <strong>{{ Auth::user()->name }}</strong>!</h5>
                <p>Anda login sebagai <strong>{{ strtoupper(Auth::user()->role) }}</strong>. Gunakan menu di sidebar sebelah kiri untuk mengelola permohonan dokumen masuk dari warga.</p>
            </div>
        </div>
    </div>
</div>
@endsection