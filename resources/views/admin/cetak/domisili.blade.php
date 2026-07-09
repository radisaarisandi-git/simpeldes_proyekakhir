<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Domisili</title>
</head>

<body>

    @include('admin.cetak.partials.kop')

    <div class="judul">

        <h3>SURAT KETERANGAN DOMISILI</h3>

        <p>
            Nomor :
            470/{{ $surat->id }}/SIMPELDES/{{ date('Y') }}
        </p>

    </div>

    @include('admin.cetak.partials.identitas')

    <p style="text-align: justify; line-height: 1.8; font-size: 12pt;">

        Berdasarkan data administrasi kependudukan yang ada pada Pemerintah
        Desa Nangnung, Kecamatan Sungailiat, Kabupaten Bangka, dengan ini
        diterangkan bahwa nama tersebut di atas benar merupakan penduduk
        Desa Nangnung dan berdomisili di wilayah tersebut.

    </p>

    <br>

    <table width="100%" style="font-family:'Times New Roman'; font-size:12pt; border-collapse:collapse;">

        <tr>
            <td width="35%">Alamat Domisili</td>
            <td width="3%">:</td>
            <td>{{ $surat->data_tambahan['alamat_domisili'] ?? '-' }}</td>
        </tr>

        <tr>
            <td>Keperluan</td>
            <td>:</td>
            <td>{{ $surat->data_tambahan['keperluan_domisili'] ?? '-' }}</td>
        </tr>

    </table>

    <p style="text-align: justify; line-height: 1.8; font-size: 12pt;">

        Demikian surat keterangan ini dibuat dengan sebenarnya agar dapat
        dipergunakan sebagaimana mestinya.

    </p>

    @include('admin.cetak.partials.ttd')

</body>

</html>
