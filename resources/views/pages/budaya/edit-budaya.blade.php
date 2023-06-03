@extends('layouts.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Data Budaya Cirebon</h1>
            </div>
            
        </div>
    </div>
</section>

<section class="content">
    <div class="conter-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <div class="card-body">
                    <form action="/budaya/update/{{ $budaya->id_budaya }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_budaya">Nama Budaya</label>
                            <input type="text" class="form-control" value="{{ $budaya->nama_budaya }}" @error('nama_budaya') is invalid @enderror id="nama_budaya" name="nama_budaya" required>
                            @error('nama_budaya')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" value="{{ $budaya->deskripsi }}" @error('deskripsi') is invalid @enderror id="deskripsi" name="deskripsi" required>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="pengelola">Pengelola</label>
                            <input type="text" class="form-control" value="{{ $budaya->pengelola }}" @error('pengelola') is invalid @enderror id="pengelola" name="pengelola" required>
                            @error('pengelola')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" value="{{ $budaya->kategori}}" @error('kategori') is invalid @enderror id="kategori" name="kategori" required>
                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" value="{{ $budaya->foto }}" @error('foto') is invalid @enderror id="foto" name="foto" required>
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="htm">Harga Tiket Masuk</label>
                            <input type="text" class="form-control" value="{{ $budaya->htm }}" @error('htm') is invalid @enderror id="htm" name="htm" required>
                            @error('htm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" value="{{ $budaya->latitude }}" @error('latitude') is invalid @enderror id="latitude" name="latitude" required>
                            @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" value="{{ $budaya->longitude }}" @error('longitude') is invalid @enderror id="longitude" name="longitude" required>
                            @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection