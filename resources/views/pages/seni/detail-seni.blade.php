@extends('layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Seni</h1>
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
                                <label for="nip_pns" class="col-sm-2 col-form-label">Nama Seni</label>
                                <div class="col-sm-10">
                                    {{ $seni->nama_seni }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    {{ $seni->deskripsi }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nip_pns" class="col-sm-2 col-form-label">Pengelola</label>
                                <div class="col-sm-10">
                                    {{ $seni->pengelola }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    {{ $seni->kategori }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nip_pns" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    {{ $seni->foto }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    {{ $seni->latitude }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nip_pns" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    {{ $seni->longitude }}
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
