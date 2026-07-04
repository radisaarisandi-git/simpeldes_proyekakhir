@extends('layouts.app')

@section('title', 'Dashboard Warga')
@section('page_title', 'Dashboard Warga')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang, <b>{{ Auth::user()->name }}</b>!</h5>
                <p class="card-text mt-2">
                    Melalui sistem ini, Anda dapat mengajukan Surat Domisili, KTP Sementara, dan Surat Pengantar secara online tanpa harus antre di kantor kelurahan.
                </p>
                <a href="{{ route('warga.surat.create') }}" class="btn btn-primary">
    <i class="fas fa-file-signature"></i> Mulai Ajukan Surat
</a>
            </div>
        </div>
    </div>
</div>
@endsection