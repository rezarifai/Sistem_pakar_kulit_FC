<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Diagnosa</title>
    <!-- Tautan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="fw-bold">Pilih Gejala</h2>
        <form action="{{ route('proses.diagnosa') }}" method="POST">
            @csrf
            <div class="row">
                @foreach($gejala as $item)
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="{{ $item->kode_gejala }}" name="gejala[]" value="{{ $item->kode_gejala }}">
                        <label class="form-check-label" for="{{ $item->kode_gejala }}">{{ $item->nama_gejala }}</label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-5 ">Proses Diagnosa</button>
            </div>            
        </form>
    </div>
</body>
</html>
