@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Seni Cirebon</h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session()->has('error'))
                <div class="alert alert-danger" id="error-flash" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body table-responsive p-0">
                            <div class="card-body">
                                <form action="/seni/store" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="nama_seni">Nama Seni</label>
                                        <input type="text" class="form-control" value="{{ old('nama_seni') }}"
                                            @error('nama_seni') is invalid @enderror id="nama_seni" name="nama_seni"
                                            required>
                                        @error('nama_seni')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" value="{{ old('deskripsi') }}"
                                            @error('deskripsi') is invalid @enderror id="deskripsi" name="deskripsi"
                                            required>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="pengelola">Pengelola</label>
                                        <input type="text" class="form-control" value="{{ old('pengelola') }}"
                                            @error('pengelola') is invalid @enderror id="pengelola" name="pengelola"
                                            required>
                                        @error('pengelola')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" class="form-control" value="{{ old('kategori') }}"
                                            @error('kategori') is invalid @enderror id="kategori" name="kategori" required>
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input class="form-control" type="file" value="{{ old('foto') }}"
                                            @error('foto') is invalid @enderror id="foto" name="foto" required>
                                        @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="htm">Harga Tiket Masuk</label>
                                        <input type="text" class="form-control" value="{{ old('htm') }}"
                                            @error('htm') is invalid @enderror id="htm" name="htm" required>
                                        @error('htm')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" class="form-control" value="{{ old('latitude') }}"
                                            @error('latitude') is invalid @enderror id="latitude" name="latitude" required>
                                        @error('latitude')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" class="form-control" value="{{ old('longitude') }}"
                                            @error('longitude') is invalid @enderror id="longitude" name="longitude"
                                            required>
                                        @error('longitude')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="card-footer">
                                        <a type="button" class="btn btn-secondary" data-dismiss="modal"
                                            href="/seni">Close</a>
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
