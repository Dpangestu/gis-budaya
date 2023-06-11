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
                            <form ng-submit="itemSearch()" class="form-inline" role="form">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search" [(ngModel)]="searchText">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default" (click)="itemSearch()">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="input-group-append">
                                    <a class="btn btn-info btn-sm" href="">
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

                                    <tr class="bg-primary" style="text-align: center">
                                        <th style="width: 50px;">No</th>
                                        <th>Nama Seni/Sanggar</th>
                                        <th>Pengelola</th>
                                        <th>Diajukan Oleh</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td>Keraton Keprabonan</td>
                                        <td>Imam</td>
                                        <td>Imam</td>
                                        <td class="text-center"><button type="button"
                                                class="btn btn-success">DITERIMA</button></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm mx-1" href="#"><i
                                                    class="fas fa-search"></i></button>
                                            <a class="btn btn-success btn-sm mx-1" href=""><i
                                                    class="fas fa-check"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm mx-1" href="#"><i
                                                    class="fas fa-x"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td>Sanggar Seni Putu Panji Asmara</td>
                                        <td>Wira</td>
                                        <td>Wira</td>
                                        <td class="text-center"><button type="button"
                                                class="btn btn-danger">DITOLAK</button></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm mx-1" href="#"><i
                                                    class="fas fa-search"></i></button>
                                            <a class="btn btn-warning btn-sm mx-1" href=""><i
                                                    class="fas fa-check"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm mx-1" href="#"><i
                                                    class="fas fa-x"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
