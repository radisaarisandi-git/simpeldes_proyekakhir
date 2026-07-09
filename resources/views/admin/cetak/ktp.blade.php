<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pengantar KTP</title>
</head>
<body>

@include('admin.cetak.partials.kop')

<div class="judul">

    <h3>SURAT PENGANTAR KTP</h3>

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

Yang bertanda tangan di bawah ini Kepala Desa Nangnung, Kecamatan Sungailiat,
Kabupaten Bangka, dengan ini memberikan pengantar kepada:

</p>

<table class="data">
    <tr>
        <td style="width:220px;">Jenis Pengajuan</td>
        <td style="width:20px;">:</td>
        <td>{{ $data['jenis_pengajuan_ktp'] ?? '-' }}</td>
    </tr>

    <tr>
        <td>Alasan Pengajuan</td>
        <td>:</td>
        <td>{{ $data['alasan_ktp'] ?? '-' }}</td>
    </tr>
</table>

<p class="isi">

Surat pengantar ini dibuat sebagai persyaratan dalam pengurusan
Kartu Tanda Penduduk (KTP) sesuai dengan ketentuan yang berlaku.

Demikian surat pengantar ini dibuat agar dapat dipergunakan sebagaimana mestinya.

</p>

@include('admin.cetak.partials.ttd')

</body>
</html>