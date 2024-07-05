@extends('layouts.landingpage')

@section('content')
<div class="container mt-5">
    <div class="card  border-0">
        <div class="card-body">
            <div class="row align-items-center " style="height: 70vh">
                <div class="col-md-6 text-center">
                    <span class="fw-bold ">Apakah Anda Mengalami Gejala Ini?</span>
                    <h1 class="fw-bold mb-5">{{ $gejala->nama_gejala }}</h1>

                    <div class="d-flex justify-content-center mb-4 gap-2">
                        <form action="{{ route('next.gejala') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="gejala_id" value="{{ $gejala->id }}">
                            <input type="hidden" name="jawaban" value="ya">
                            <button type="submit" class="btn btn-primary px-5 py-2">
                                <i class="bi bi-check-circle-fill me-2"></i> Ya
                            </button>
                        </form>
                        <form action="{{ route('next.gejala') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="gejala_id" value="{{ $gejala->id }}">
                            <input type="hidden" name="jawaban" value="tidak">
                            <button type="submit" class="btn btn-danger px-5 py-2">
                                <i class="bi bi-x-circle-fill me-2"></i> Tidak
                            </button>
                        </form>
                    </div>

                    <div class="text-center">
                        <div class="alert alert-info" role="alert">
                            <i class="bi bi-info-circle-fill text-primary me-2"></i>
                            Pilih "Ya" jika Anda mengalami gejala tersebut, atau "Tidak" jika tidak.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center ">
                    <img src="{{ asset('storage/' . $gejala->gambar) }}" alt="{{ $gejala->nama_gejala }}" class="img-fluid rounded shadow mt-md-0 mt-5">
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
