@extends('layouts.main')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Budaya Cirebon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Peta Lokasi Budaya Cirebon</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                                <div id="map" style="height: 500px;">
                                </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Budaya Cirebon</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-tools">
                                <form ng-submit="itemSearch()" class="form-inline" role="form">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search" [(ngModel)]="searchText">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" (click)="itemSearch()">
                                      <i class="fas fa-search"></i>
                                  </button>
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="input-group-append">
                                        <a type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#form-tambah-data">
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                    </div>
                                    &nbsp;
                                    <div class="input-group-append">
                                        <a class="btn btn-info btn-sm" href="">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </div>
                                    &nbsp;
                                </form>
                            </div>
                            <br>
                            <table class="table table-hover table-striped table-bordered text-nowrap">
                                <thead>
                                
                                    <tr class="bg-primary" style="text-align: center">
                                        <th style="width: 50px;">No</th>
                                        <th>Nama Budaya</th>
                                        <th>Pengelola</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ;?>
                                    @foreach ($budayas as $item )
                                    <tr>
                                        <td class="text-center"><?= $i++ ;?></td>
                                        <td>{{ $item->nama_budaya }}</td>
                                        <td>{{ $item->pengelola }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm mx-1" href="#"><i class="fas fa-search"></i></button>
                                            <a class="btn btn-warning btn-sm mx-1" href=""><i class="fas fa-pencil-alt"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm mx-1" href="#"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- modal tambah --}}
    <div class="modal fade" id="form-tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Tambah Data Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/budaya/store" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nama_budaya">Nama Budaya</label>
                            <input type="text" class="form-control" value="{{ old('nama_budaya') }}" @error('nama_budaya') is invalid @enderror id="nama_budaya" name="nama_budaya" required>
                            @error('nama_budaya')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" value="{{ old('deskripsi') }}" @error('deskripsi') is invalid @enderror id="deskripsi" name="deskripsi" required>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pengelola">Pengelola</label>
                            <input type="text" class="form-control" value="{{ old('pengelola') }}" @error('pengelola') is invalid @enderror id="pengelola" name="pengelola" required>
                            @error('pengelola')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" value="{{ old('kategori') }}" @error('kategori') is invalid @enderror id="kategori" name="kategori" required>
                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" value="{{ old('foto') }}" @error('foto') is invalid @enderror id="foto" name="foto" required>
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="htm">Harga Tiket Masuk</label>
                            <input type="text" class="form-control" value="{{ old('htm') }}" @error('htm') is invalid @enderror id="htm" name="htm" required>
                            @error('htm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" value="{{ old('latitude') }}" @error('latitude') is invalid @enderror id="latitude" name="latitude" required>
                            @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" value="{{ old('longitude') }}" @error('longitude') is invalid @enderror id="longitude" name="longitude" required>
                            @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection