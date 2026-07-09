<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Tidak Mampu</title>
</head>

<body>

    @include('admin.cetak.partials.kop')

    <div class="judul">

        <h3>SURAT KETERANGAN TIDAK MAMPU</h3>

        <p>
            Nomor :
            470/{{ $surat->id }}/SIMPELDES/{{ date('Y') }}
        </p>

    </div>

    @include('admin.cetak.partials.identitas')

    <p style="text-align:justify; line-height:1.8; font-size:12pt;">

        Berdasarkan hasil pemeriksaan administrasi yang ada pada Pemerintah Desa Nangnung,
        Kecamatan Sungailiat, Kabupaten Bangka, dengan ini menerangkan bahwa nama tersebut
        di atas benar merupakan warga yang berasal dari keluarga kurang mampu.

    </p>

    <table width="100%" style="font-family:'Times New Roman'; font-size:12pt; border-collapse:collapse;">

        <tr>
            <td width="32%">Penghasilan Per Bulan</td>
            <td width="3%">:</td>
            <td>
                Rp {{ number_format($surat->data_tambahan['penghasilan'] ?? 0, 0, ',', '.') }}
            </td>
        </tr>

        <tr>
            <td>Jumlah Tanggungan</td>
            <td>:</td>
            <td>
                {{ $surat->data_tambahan['jumlah_tanggungan'] ?? '-' }} Orang
            </td>
        </tr>

        <tr>
            <td>Keperluan</td>
            <td>:</td>
            <td>
                {{ $surat->data_tambahan['keperluan_sktm'] ?? '-' }}
            </td>
        </tr>

    </table>

    <p style="text-align:justify; line-height:1.8; font-size:12pt;">

        Surat keterangan ini dibuat berdasarkan data yang ada pada Pemerintah Desa
        Nangnung dan diberikan kepada yang bersangkutan untuk dipergunakan
        sebagaimana mestinya.

    </p>

    @include('admin.cetak.partials.ttd')

</body>

</html>
