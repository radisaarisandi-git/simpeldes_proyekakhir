<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Surat Keterangan Usaha</title>

</head>

<body>

@include('admin.cetak.partials.kop')

<div class="judul">

    <h3>SURAT KETERANGAN USAHA</h3>

    <p>

        Nomor :
        470/{{ $surat->id }}/SIMPELDES/{{ date('Y') }}

    </p>

</div>

@include('admin.cetak.partials.identitas')

<p style="text-align: justify; line-height:1.8; font-size:12pt;">

    Berdasarkan hasil pemeriksaan data administrasi yang ada pada Pemerintah Desa Nangnung, benar bahwa yang bersangkutan memiliki usaha
    dengan rincian sebagai berikut:

</p>

<table width="100%" style="font-family:'Times New Roman'; font-size:12pt; border-collapse:collapse; margin-top:10px;">

    <tr>
        <td width="32%">Nama Usaha</td>
        <td width="3%">:</td>
        <td>{{ $surat->data_tambahan['nama_usaha'] ?? '-' }}</td>
    </tr>

    <tr>
        <td>Jenis Usaha</td>
        <td>:</td>
        <td>{{ $surat->data_tambahan['jenis_usaha'] ?? '-' }}</td>
    </tr>

    <tr>
        <td>Alamat Usaha</td>
        <td>:</td>
        <td>{{ $surat->data_tambahan['alamat_usaha'] ?? '-' }}</td>
    </tr>

    <tr>
        <td>Lama Usaha</td>
        <td>:</td>
        <td>{{ $surat->data_tambahan['lama_usaha'] ?? '-' }} Tahun</td>
    </tr>

</table>

<p style="text-align:justify; line-height:1.8; font-size:12pt;">

    Surat keterangan ini dibuat dengan sebenarnya berdasarkan data yang ada
    pada Pemerintah Desa Nangnung dan diberikan kepada yang bersangkutan
    untuk dipergunakan sebagaimana mestinya.

</p>


@include('admin.cetak.partials.ttd')

</body>

</html>