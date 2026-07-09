<p style="text-align: justify; line-height: 1.8; font-size: 12pt;">

    Yang bertanda tangan di bawah ini, Kepala Desa Nangnung,
    Kecamatan Sungailiat, Kabupaten Bangka, dengan ini menerangkan bahwa:

</p>


<table width="100%" style="font-family:'Times New Roman'; font-size:12pt; border-collapse:collapse;">
 
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>
            <strong>{{ strtoupper($surat->user->name ?? '-') }}</strong>
        </td>
    </tr>

    <tr>
        <td width="32%">NIK</td>
        <td width="3%">:</td>
        <td>{{ $surat->user->kependudukan->nik ?? '-' }}</td>
    </tr>

    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>:</td>
        <td>
            {{ $surat->user->kependudukan->tempat_lahir ?? '-' }},
            {{ $surat->user->kependudukan->tanggal_lahir 
                ? \Carbon\Carbon::parse($surat->user->kependudukan->tanggal_lahir)->translatedFormat('d F Y')
                : '-' 
            }}
        </td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $surat->user->kependudukan->jenis_kelamin ?? '-' }}</td>
    </tr>

    <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $surat->user->kependudukan->agama ?? '-' }}</td>
    </tr>

    <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td>{{ $surat->user->kependudukan->status_perkawinan ?? '-' }}</td>
    </tr>

    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $surat->user->kependudukan->pekerjaan ?? '-' }}</td>
    </tr>

    <tr>
        <td style="vertical-align: top;">Alamat</td>
        <td style="vertical-align: top;">:</td>
        <td>{{ $surat->user->kependudukan->alamat ?? '-' }}</td>
    </tr>

</table>
