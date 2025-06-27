<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Diagnosa</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            color: white;
            border-radius: 4px;
            font-size: 12px;
        }

        .green {
            background-color: #16a34a;
        }

        .red {
            background-color: #dc2626;
        }

        .section {
            margin-bottom: 30px;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Hasil Diagnosa</h2>

    <div class="section">
        <p><span class="label">Nama Pengguna:</span> {{ $user->name }}</p>
        <p><span class="label">Tanggal Diagnosa:</span> {{ $today }}</p>
    </div>

    <div class="section">
        <h3>Detail Penyakit yang Terdeteksi</h3>
        <table>
            @foreach ($penyakits as $penyakit)
                <tr>
                    <th>Nama Penyakit</th>
                    <td>{{ $penyakit->nama_penyakit }}</td>
                </tr>
                <tr>
                    <th>Kode Penyakit</th>
                    <td>{{ $penyakit->kode_penyakit }}</td>
                </tr>
                <tr>
                    <th>Penyebab</th>
                    <td>{{ $penyakit->penyebab }}</td>
                </tr>
                <tr>
                    <th>Solusi</th>
                    <td>{{ $penyakit->solusi }}</td>
                </tr>
                <tr>
                    <th>Persentase Kemungkinan</th>
                    <td>
                        <span class="badge {{ $lastDiagnosa->persentase < 50 ? 'red' : 'green' }}">
                            {{ round($lastDiagnosa->persentase, 2) }}%
                        </span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="section">
        <h3>Gejala yang Dipilih</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($selectedSymptoms as $index => $gejala)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $gejala->kode_gejala }}</td>
                        <td>{{ $gejala->nama_gejala }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
