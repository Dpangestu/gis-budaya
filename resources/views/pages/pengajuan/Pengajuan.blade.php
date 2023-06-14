@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengajuan Data Situs Seni Budaya</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                </ol> --}}
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" id="success-flash" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pengajuan</h3>
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
                            {{-- form search dan data add --}}
                            <form action="/pengajuan/search" class="form-inline">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="search_text" class="form-control float-right"
                                        placeholder="Search" value="{{ $searchText ?? '' }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="input-group-append">
                                    <a class="btn btn-info btn-sm" href="/pengajuan/create">
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

                            <br>
                            <table class="table table-hover table-striped table-bordered text-nowrap">
                                <thead>
                                    <thead>

                                        <tr class="bg-primary" style="text-align: center">
                                            <th style="width: 50px;">No</th>
                                            <th>Nama Seni/Sanggar</th>
                                            <th>Pengelola</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th style="width: 300px;">Aksi</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($pengajuans as $item)
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td>{{ $item->nama_data }}</td>
                                            <td>{{ $item->pengelola }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td class="text-center">
                                                @if ($item->status == 'pending')
                                                    <span class="badge badge-warning">PENDING...</span>
                                                @elseif ($item->status == 'approved')
                                                    <span class="badge badge-success">DITERIMA</span>
                                                @elseif ($item->status == 'rejected')
                                                    <span class="badge badge-danger">DITOLAK !</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="form-inline">
                                                    <button type="button" class="btn btn-primary btn-sm mx-1"
                                                        href="#"><i class="fas fa-search"></i></button>
                                                    <form action="/pengajuan/{{ $item->id_pengajuan }}/approve"
                                                        method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-success btn-sm"><i
                                                                class="fas fa-check"></i></button>
                                                    </form>
                                                    &nbsp;
                                                    <form action="/pengajuan/{{ $item->id_pengajuan }}/reject"
                                                        method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>
                                                </div>
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
@endsection
