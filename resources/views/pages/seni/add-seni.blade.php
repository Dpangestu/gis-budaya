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
        <div class="conter-fluid">
            @if (session()->has('error'))
                <div class="alert alert-success" id="error-flash" role="alert">
                    {{ session('error') }}
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

                        <div class="card-body table-responsive p-0">
                            <div class="card-body">
                                <form action="/seni/store" method="post">
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
                                        <input type="file" class="form-control-file" value="{{ old('foto') }}"
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
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            onclick="saveSeni()">Simpan</button>
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
