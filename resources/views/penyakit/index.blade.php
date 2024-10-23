@extends('layouts.dashboard')
@section('title','Data Penyakit')
@section('content')
   <div class="card p-3 shadow border-0">

    <div class="col-md-3 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah
        </button>
    </div>
    <table class="table table-striped" id="table1" >
        <thead>
            <tr>
                <th>Kode Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Penyebab</th>
                <th>Solusi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($penyakit as $item)
           <tr>
            <td>{{ $item->kode_penyakit }}</td>
            <td>{{ $item->nama_penyakit }}</td>
            <td>{{ $item->penyebab }}</td>
            <td>{{ $item->solusi }}</td>
            <td>
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_penyakit }}" width="100">
                @else
                    Tidak ada gambar
                @endif
            </td>
            <td>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">Hapus</button>
                </div>
            </td>
        </tr>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Penyakit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('penyakit.update', ['penyakit' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kode_penyakit_{{ $item->id }}" class="form-label">Kode Penyakit</label>
                                <input type="text" class="form-control" id="kode_penyakit_{{ $item->id }}" name="kode_penyakit" value="{{ $item->kode_penyakit }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_penyakit_{{ $item->id }}" class="form-label">Nama Penyakit</label>
                                <input type="text" class="form-control" id="nama_penyakit_{{ $item->id }}" name="nama_penyakit" value="{{ $item->nama_penyakit }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="penyebab_{{ $item->id }}" class="form-label">Penyebab</label>
                                <textarea class="form-control" id="penyebab_{{ $item->id }}" name="penyebab" required>{{ $item->penyebab }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="solusi_{{ $item->id }}" class="form-label">Solusi</label>
                                <textarea class="form-control" id="solusi_{{ $item->id }}" name="solusi" required>{{ $item->solusi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_{{ $item->id }}" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar_{{ $item->id }}" name="gambar">
                            </div>
                            @if ($item->gambar)
                                <img src="{{ asset('/' . $item->gambar) }}" width="100" class="mt-3" alt="Gambar Penyakit">
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Hapus Penyakit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus penyakit ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('penyakit.destroy', ['penyakit' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </tbody>
    </table>
   </div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Penyakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('penyakit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_penyakit" class="form-label">Kode Penyakit</label>
                        <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                        <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" required>
                    </div>
                    <div class="mb-3">
                        <label for="penyebab" class="form-label">Penyebab</label>
                        <textarea class="form-control" id="penyebab" name="penyebab" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="solusi" class="form-label">Solusi</label>
                        <textarea class="form-control" id="solusi" name="solusi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
