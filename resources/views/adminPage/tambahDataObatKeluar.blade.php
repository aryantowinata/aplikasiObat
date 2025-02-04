@extends('layouts.mainLayouts')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fa-solid fa-plus"></i> Tambah Obat Keluar di {{ $tempat->nama_tempat }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a class="btn btn-primary btn-large" href="{{ route('admin.data-obat-keluar', $tempat->id) }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <form action="{{ route('admin.simpan.obat-keluar') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="kodeObatKeluar">Kode Obat Keluar</label>
                            <input type="text" class="form-control" id="kodeObatKeluar" name="kode_obat_keluar" value="Digenerate Otomatis" disabled />
                        </div>
                        <div class="form-group">
                            <label for="tanggalObatMasuk">Tanggal Distribusi</label>
                            <input type="date" class="form-control" id="tanggalObatMasuk" name="tanggal_distribusi" />
                        </div>
                        <div class="form-group">
                            <label for="kodeObat">Kode Obat</label>
                            <select class="form-control" id="kodeObat" name="kode_obat">
                                <option value="">Pilih Kode Obat</option>
                                @foreach ($obatList as $obat)
                                <option value="{{ $obat->kode_obat }}" data-nama="{{ $obat->nama_obat }}">
                                    {{ $obat->kode_obat }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namaObat">Nama Obat</label>
                            <input type="text" class="form-control" id="namaObat" name="nama_obat" />
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" />
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggalKardaluarsa">Tanggal Kadaluarsa</label>
                            <input type="date" class="form-control" id="tanggalKardaluarsa" name="tanggal_kadaluarsa" />
                        </div>

                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $tempat->nama_tempat }}" disabled />
                        </div>

                        <input type="hidden" name="id_tempat" value="{{ $tempat->id }}" />


                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection