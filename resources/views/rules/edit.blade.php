@extends('layouts.dashboard')
@section('title','Edit Aturan')
@section('content')
   <div class="card p-3 shadow border-0">
    <div class="card-body">
        <h5 class="card-title">Edit Aturan</h5>
        <form action="{{ route('rules.update', $penyakit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="penyakit">Penyakit</label>
                <input type="text" class="form-control" id="penyakit" name="penyakit" value="{{ $penyakit->nama_penyakit }}" readonly>
            </div>
            <div class="form-group">
                <label for="gejala">Gejala</label>
                <select class="form-control select2" name="gejala_id[]" id="gejala" multiple>
                    @foreach($gejala as $g)
                        <option value="{{ $g->id }}" {{ $penyakit->gejalas->contains($g->id) ? 'selected' : '' }}>{{ $g->nama_gejala }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
   </div>
@endsection
