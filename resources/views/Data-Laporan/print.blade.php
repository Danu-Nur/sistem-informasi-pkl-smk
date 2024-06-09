<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data PKL</title>

    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        html,
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 200mm;
            height: 277mm;
            /* Adjusted for page margin */
            padding: 5mm;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        img {
            width: 80%;
            height: auto;
            margin: 0;
        }

        @media print {
            table {
                page-break-inside: avoid;
            }

            body {
                padding: 10px;
            }

            tr {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="header-laporan" style="padding-bottom: 20px">
            <table>
                <tr>
                    <td style="text-align: center;border: none;">
                        <h1>Laporan Data PKL</h1>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Nama</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['siswa']['nama_siswa'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Nomor Induk</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['siswa']['nomor_induk'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Kelas</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['siswa']['kelas'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Jurusan</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['siswa']['jurusan'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Lokasi PKL</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['lokasi_pkl'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Alamat PKL</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['alamat_pkl'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Pembimbing Sekolah</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['pembimbingSekolah']['name'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
                <tr>
                    <td style="border: none;padding-bottom: 0;">Pembimbing Industri</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;">
                        {{ $data_siswa ? $data_siswa['pembimbingIndustri']['name'] : 'Data tidak ditemukan' }}
                    </td>
                </tr>
            </table>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Foto Kegiatan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_nilai)
                    @foreach ($data_nilai as $data)
                        <tr>
                            <td style="text-align: center;">
                                <img src="{{ public_path($data['kegiatan']['dokumentasi']) }}" width="100px"
                                    alt="">
                            </td>
                            <td style="text-align: left;">
                                <p>Jadwal:
                                    {{ $data['kegiatan']['jadwal']['tanggal'] . ' ' . $data['kegiatan']['jadwal']['jam'] }}
                                </p>
                                <hr>
                                <p>Absen :
                                    {{ $data['kegiatan']['absensi']['tanggal_absen'] . ' ' . $data['kegiatan']['absensi']['waktu_absen'] . ' (' . $data['kegiatan']['absensi']['status_absen'] . ')' }}
                                </p>
                                <hr>
                                <p>Kegiatan : {{ $data['kegiatan']['keterangan'] }}</p>
                                <hr>
                                <p>Nilai PKL: {{ $data['nilai_pkl'] }}</p>
                                <p>Nilai Sikap: {{ $data['nilai_sikap'] }}</p>
                                <p>Catatan Pembimbing: {{ $data['keterangan'] }}</p>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
