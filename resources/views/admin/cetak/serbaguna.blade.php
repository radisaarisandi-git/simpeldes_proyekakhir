<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan</title>
</head>
<body>

@include('admin.cetak.partials.kop')

<div class="judul">

    <h3>SURAT KETERANGAN</h3>

    <p>
        Nomor :
        470/{{ $surat->id }}/SIMPELDES/{{ date('Y') }}
    </p>

</div>

@include('admin.cetak.partials.identitas')

<p class="isi">

    Berdasarkan data administrasi kependudukan yang ada pada Pemerintah
    Desa Nangnung, Kecamatan Sungailiat, Kabupaten Bangka, bahwa nama
    tersebut di atas benar merupakan penduduk Desa Nangnung.

</p>

<p class="isi">

    Surat keterangan ini diberikan kepada yang bersangkutan untuk
    dipergunakan sebagai persyaratan:

</p>

<table class="data">

    <tr>
        <td style="width:220px;">Keperluan</td>
        <td style="width:20px;">:</td>
        <td>{{ $surat->data_tambahan['keperluan'] ?? '-' }}</td>
    </tr>

</table>

<p class="isi">

    Demikian surat keterangan ini dibuat dengan sebenarnya agar dapat
    dipergunakan sebagaimana mestinya.

</p>

@include('admin.cetak.partials.ttd')

</body>
</html>