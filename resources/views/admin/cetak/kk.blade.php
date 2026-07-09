<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pengantar Kartu Keluarga</title>
</head>
<body>

@include('admin.cetak.partials.kop')

<div class="judul">

    <h3>SURAT PENGANTAR KARTU KELUARGA (KK)</h3>

    <p>
        Nomor :
        470/{{ $surat->id }}/SIMPELDES/{{ date('Y') }}
    </p>

</div>

@include('admin.cetak.partials.identitas')

@php
    $data = $surat->data_tambahan;
@endphp

<p class="isi">

    Yang bertanda tangan di bawah ini Kepala Desa Nangnung,
    Kecamatan Sungailiat, Kabupaten Bangka, menerangkan bahwa
    nama tersebut di atas benar merupakan penduduk Desa Nangnung
    dan mengajukan permohonan pembuatan/penggantian Kartu Keluarga
    dengan rincian sebagai berikut:

</p>

<table class="data">

    <tr>
        <td style="width:220px;">Jenis Pengajuan</td>
        <td style="width:20px;">:</td>
        <td>{{ $data['jenis_pengajuan_kk'] ?? '-' }}</td>
    </tr>

    <tr>
        <td>Alasan Pengajuan</td>
        <td>:</td>
        <td>{{ $data['alasan_kk'] ?? '-' }}</td>
    </tr>

</table>

<p class="isi">

    Surat pengantar ini dibuat sebagai salah satu persyaratan
    administrasi dalam pengurusan Kartu Keluarga (KK) pada instansi
    yang berwenang.

</p>

<p class="isi">

    Demikian surat pengantar ini dibuat agar dapat dipergunakan
    sebagaimana mestinya.

</p>

@include('admin.cetak.partials.ttd')

</body>
</html>