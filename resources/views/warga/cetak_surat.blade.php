<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Serbaguna</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; line-height: 1.4; margin: 20px; font-size: 12pt; color: #000; }
        .kop-surat { text-align: center; border-bottom: 3px double #000; padding-bottom: 5px; margin-bottom: 20px; }
        .kop-surat h3 { margin: 0; font-size: 14pt; text-transform: uppercase; }
        .kop-surat h4 { margin: 0; font-size: 16pt; font-weight: bold; text-transform: uppercase; }
        .kop-surat p { margin: 0; font-size: 10pt; font-style: italic; }
        .judul-surat { text-align: center; margin-bottom: 25px; }
        .judul-surat h5 { margin: 0; font-size: 13pt; text-decoration: underline; font-weight: bold; text-transform: uppercase; }
        .judul-surat p { margin: 0; font-size: 11pt; }
        .tabel-data { width: 100%; margin-left: 30px; margin-top: 15px; margin-bottom: 15px; }
        .tabel-data td { padding: 3px; vertical-align: top; }
        .penutup { text-indent: 40px; text-align: justify; }
        .ttd-container { width: 100%; margin-top: 40px; }
        .ttd-box { width: 45%; float: right; text-align: center; }
        .ttd-box-left { width: 45%; float: left; text-align: center; }
        .space { height: 70px; }
    </style>
</head>
<body>

    <div class="kop-surat">
        <h3>Pemerintah Kabupaten Bangka</h3>
        <h3>Kecamatan Sungailiat</h3>
        <h4>Desa Nangnung</h4>
        <p>Jalan Timah Raya Politeknik Manufaktur Negeri Bangka Belitung</p>
    </div>

    <div class="judul-surat">
        <h5>{{ strtoupper($surat->jenis_surat) }}</h5>
        <p>NOMOR : 474 / 4 / 146-SIMPELDES / NANGNUNG</p>
    </div>

    <p>Yang bertanda tangan di bawah ini Kepala Desa Sukaresmi Kecamatan Rongga Kabupaten Bandung Barat menerangkan bahwa :</p>

    <table class="tabel-data">
        <tr>
            <td width="30%">Nik</td>
            <td width="3%">:</td>
            <td>{{ $surat->data_tambahan['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td style="text-transform: uppercase; font-weight: bold;">{{ $surat->data_tambahan['nama'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tempat tanggal lahir</td>
            <td>:</td>
            <td>{{ $surat->data_tambahan['ttl'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jenis kelamin</td>
            <td>:</td>
            <td>{{ $surat->data_tambahan['jenis_kelamin'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $surat->data_tambahan['agama'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $surat->data_tambahan['status_perkawinan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Warga Negara</td>
            <td>:</td>
            <td>Indonesia</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $surat->data_tambahan['pekerjaan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $surat->data_tambahan['alamat'] ?? '-' }}</td>
        </tr>
    </table>

    <p class="penutup">Orang tersebut di atas adalah benar-benar warga penduduk kami dan telah datang meminta surat Keterangan serbaguna untuk keperluan: <strong>{{ $surat->data_tambahan['keperluan'] ?? '-' }}</strong>.</p>
    
    <p>Demikian Surat keterangan ini kami berikan untuk dipergunakan sebagaimana mestinya.</p>

    <div class="ttd-container">
        <div class="ttd-box-left">
            <p><br>Yang Bersangkutan</p>
            <div class="space"></div>
            <p style="text-decoration: underline; font-weight: bold;">{{ strtoupper($surat->data_tambahan['nama'] ?? 'Nama Warga') }}</p>
        </div>
        <div class="ttd-box">
            <p>Sukaresmi, {{ $surat->created_at->format('d M Y') }}<br>Kepala Desa Sukaresmi</p>
            <div class="space"></div>
            <p style="text-decoration: underline; font-weight: bold;">AFDAL MAULANA</p>
        </div>
    </div>

</body>
</html>