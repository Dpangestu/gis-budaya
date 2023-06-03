@extends('layouts.main')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Budaya Cirebon</h1>
                </div>
                <div class="col-sm-6">
                    
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
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
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
                                <div id="map" style="height: 400px;">
                                    @section('scripts')
                                    
                                    @endsection
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
                                        <a class="btn btn-info btn-sm" href="/budaya/create">
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
                                            <a class="btn btn-warning btn-sm mx-1" href="/budaya/edit/{{ $item->id_budaya }}"><i class="fas fa-pencil-alt"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    data-toggle="modal"
                                                    data-target="#konfirmasi-hapus-{{ $item->id_budaya }}">
                                                    <i class="fas fa-trash"></i>
                                            </button>
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

    {{-- modal delete --}}
    @foreach ($budayas as $item )
    <div class="modal fade" id="konfirmasi-hapus-{{ $item->id_budaya }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/budaya/destroy/{{ $item->id_budaya }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        Apakah anda yakin ingin menghapus data ini ?
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- maps --}}
    
@endsection