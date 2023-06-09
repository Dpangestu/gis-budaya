@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Seni Cirebon</h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
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
                            <h3 class="card-title">Peta Lokasi Seni Cirebon</h3>
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
                            <div class="p-1 flex-fill" style="overflow: hidden">
                                <div id="map" style="height: 400px;">
                                    <script>
                                        var map = L.map('map').setView([-6.7488, 108.5595], 10);

                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
                                        }).addTo(map);

                                        // Mendefinisikan batas-batas geografis Kabupaten Cirebon
                                        var bounds = [
                                            [-6.9818, 108.2693], // Koordinat sudut barat laut
                                            [-6.6661, 108.8244] // Koordinat sudut tenggara
                                        ];

                                        // Menampilkan batas-batas geografis Kabupaten Cirebon pada peta
                                        map.fitBounds(bounds);

                                        var marker;

                                        map.on('click', function(e) {
                                            if (marker) {
                                                map.removeLayer(marker);
                                            }
                                            marker = L.marker(e.latlng).addTo(map);
                                            marker.bindPopup('<b>Marker</b><br>Latitude: ' + e.latlng.lat.toFixed(7) + '<br>Longitude: ' + e.latlng
                                                .lng.toFixed(7));

                                            // Simpan marker ke database atau lakukan operasi lainnya
                                            var latitude = e.latlng.lat.toFixed(7);
                                            var longitude = e.latlng.lng.toFixed(7);

                                            // Kirim data ke server menggunakan AJAX atau bentuk lainnya
                                            // Contoh menggunakan AJAX dengan jQuery
                                            $.ajax({
                                                url: '/save-marker',
                                                method: 'POST',
                                                data: {
                                                    latitude: latitude,
                                                    longitude: longitude
                                                },
                                                success: function(response) {
                                                    console.log('Marker berhasil disimpan');
                                                },
                                                error: function(xhr, status, error) {
                                                    console.log('Terjadi kesalahan: ' + error);
                                                }
                                            });
                                        });

                                        // Menampilkan data 
                                        @foreach ($senis as $seni)
                                            var marker = L.marker([{{ $seni->latitude }}, {{ $seni->longitude }}]).addTo(map);
                                            marker.bindPopup("<b>{{ $seni->nama_seni }}</b><br>{{ $seni->deskripsi }}");
                                        @endforeach
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Seni Cirebon</h3>
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
                                <form action="/seni/search" class="form-inline float-right" style="margin-top: 23px;">
                                    &nbsp;
                                    <div class="input-group-append">
                                        <a class="btn btn-info btn-sm" href="/seni/create">
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
                            <table class="table table-hover table-striped table-bordered text-nowrap" id="example1">
                                <thead>

                                    <tr class="bg-primary" style="text-align: center">
                                        <th style="width: 50px;">No</th>
                                        <th>Nama Seni</th>
                                        <th>Pengelola</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($senis as $item)
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td>{{ $item->nama_seni }}</td>
                                            <td>{{ $item->pengelola }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-primary btn-sm mx-1"
                                                    href="/seni/show/{{ $item->id_seni }}"><i class="fas fa-search"></i></a>
                                                <a class="btn btn-warning btn-sm mx-1"
                                                    href="/seni/edit/{{ $item->id_seni }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    data-toggle="modal"
                                                    data-target="#konfirmasi-hapus-{{ $item->id_seni }}">
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
    @foreach ($senis as $item)
        <div class="modal fade" id="konfirmasi-hapus-{{ $item->id_seni }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Seni</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/seni/destroy/{{ $item->id_seni }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            Apakah anda yakin ingin menghapus data ini?
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
@endsection
