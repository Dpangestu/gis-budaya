@extends('layouts.jadwal')
@section('content')
    {{-- @include ('layouts.script') --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal Event</h1>
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
                        <div class="card-header" id="external-events">
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
                            <div id="calendar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {{-- <div class="sticky-top mb-3"> --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Jadwal Event</h3>
                        </div>
                        <div class="card-body">
                            <form action="/jadwal/store" method="post">
                                @csrf

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label for="warna_acara" class="input-group-text">Warna Acara</label>
                                        </div>
                                        <input type="color" class="form-control" id="warna_acara" name="warna_acara"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_seni">Seni</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="seniCheckbox"
                                            name="seniCheckbox">
                                        <label class="form-check-label" for="seniCheckbox">Seni</label>
                                    </div>
                                    <select class="form-select" id="seniSelect" name="id_seni" style="display: none;">
                                        @foreach ($dataSeni as $seni)
                                            <option value="{{ $seni->id_seni }}">{{ $seni->nama_seni }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_budaya">Budaya</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="budayaCheckbox"
                                            name="budayaCheckbox">
                                        <label class="form-check-label" for="budayaCheckbox">Budaya</label>
                                    </div>
                                    <select class="form-select" id="budayaSelect" name="id_budaya" style="display: none;">
                                        @foreach ($dataBudaya as $budaya)
                                            <option value="{{ $budaya->id_budaya }}">{{ $budaya->nama_budaya }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const seniCheckbox = document.getElementById('seniCheckbox');
                                        const budayaCheckbox = document.getElementById('budayaCheckbox');
                                        const seniSelect = document.getElementById('seniSelect');
                                        const budayaSelect = document.getElementById('budayaSelect');

                                        seniCheckbox.addEventListener('change', function() {
                                            seniSelect.style.display = seniCheckbox.checked ? 'block' : 'none';
                                            budayaCheckbox.checked = false;
                                            budayaSelect.style.display = 'none';
                                        });

                                        budayaCheckbox.addEventListener('change', function() {
                                            budayaSelect.style.display = budayaCheckbox.checked ? 'block' : 'none';
                                            seniCheckbox.checked = false;
                                            seniSelect.style.display = 'none';
                                        });
                                    });
                                </script>

                                <div class="form-group">
                                    <label for="nama_acara">Nama Acara</label>
                                    <input type="text" class="form-control" value="{{ old('nama_acara') }}"
                                        @error('nama_acara') is invalid @enderror id="nama_acara" name="nama_acara"
                                        required>
                                    @error('nama_acara')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" value="{{ old('deskripsi') }}"
                                        @error('deskripsi') is invalid @enderror id="deskripsi" name="deskripsi" required>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mulai_acara">mulai_acara</label>
                                    <input type="date" class="form-control" value="{{ old('mulai_acara') }}"
                                        @error('mulai_acara') is invalid @enderror id="mulai_acara" name="mulai_acara"
                                        required>
                                    @error('mulai_acara')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="akhir_acara">akhir_acara</label>
                                    <input type="date" class="form-control" value="{{ old('akhir_acara') }}"
                                        @error('akhir_acara') is invalid @enderror id="akhir_acara" name="akhir_acara"
                                        required>
                                    @error('akhir_acara')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>

                <div class="col-md-8">
                    <div class="card" style="height: 694px">
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
                            <table class="table table-hover table-striped table-bordered text-nowrap" id="example1">
                                <thead>
                                    <tr class="bg-primary" style="text-align: center">
                                        <th style="width: 50px;">No</th>
                                        <th>Nama Acara</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($jadwals as $item)
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td>{{ $item->nama_acara }}</td>
                                            <td>{{ $item->mulai_acara }} s.d. {{ $item->akhir_acara }}</td>
                                            <td style="text-align: center">
                                                <button type="button" class="btn btn-primary btn-sm mx-1"
                                                    href="#"><i class="fas fa-search"></i></button>
                                                <a class="btn btn-warning btn-sm mx-1"
                                                    href="/jadwal/edit/{{ $item->id_jadwal }}"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                    data-toggle="modal"
                                                    data-target="#konfirmasi-hapus-{{ $item->id_jadwal }}">
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
    @foreach ($jadwals as $item)
        <div class="modal fade" id="konfirmasi-hapus-{{ $item->id_jadwal }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/jadwal/destroy/{{ $item->id_jadwal }}" method="POST" class="d-inline">
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
