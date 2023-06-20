@extends('layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Budaya </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nip_pns" class="col-sm-2 col-form-label">Nama Budaya</label>
                                <div class="col-sm-10">
                                    {{ $budaya->nama_budaya }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    {{ $budaya->deskripsi }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nip_pns" class="col-sm-2 col-form-label">Pengelola</label>
                                <div class="col-sm-10">
                                    {{ $budaya->pengelola }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    {{ $budaya->kategori }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nip_pns" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    {{ $budaya->foto }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    {{ $budaya->latitude }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nip_pns" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    {{ $budaya->longitude }}
                                </div>
                            </div>

                            <!-- Display other details as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
