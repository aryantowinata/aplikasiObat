@extends('layouts.mainLayouts')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fa-solid fa-pen-to-square"></i> Edit Data Obat Masuk</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="fa-solid fa-folder"></i> <a href="{{ route('admin.data-obat-masuk') }}">Data Obat Masuk</a> > Edit
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <form action="{{ route('admin.update-data-obat-keluar', ['id' => $obatKeluar->id]) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kodeObatKeluar">Kode Obat Keluar</label>
                            <input type="text" class="form-control" id="kodeObatKeluar" name="kode_obat_keluar" value="{{ $obatKeluar->kode_obat_keluar }}" disabled />
                        </div>
                        <div class=" form-group">
                            <label for="tanggalObatMasuk">Tanggal Distribusi</label>
                            <input type="date" class="form-control" id="tanggalObatMasuk" name="tanggal_distribusi" value="{{ $obatKeluar->tanggal_distribusi }}" />
                        </div>
                        <div class="form-group">
                            <label for="kodeObat">Kode Obat</label>
                            <select class="form-control" id="kodeObat" name="kode_obat">
                                <option value="{{ $obatKeluar->kode_obat }}">{{ $obatKeluar->kode_obat }}</option>
                                @foreach ($obatList as $obat)
                                <option value="{{ $obat->kode_obat }}" data-nama="{{ $obat->nama_obat }}">
                                    {{ $obat->kode_obat }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namaObat">Nama Obat</label>
                            <input type="text" class="form-control" id="namaObat" name="nama_obat" value="{{ $obatKeluar->nama_obat }}" />
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $obatKeluar->satuan }}" />
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $obatKeluar->jumlah }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggalKardaluarsa">Tanggal Kadaluarsa</label>
                            <input type="date" class="form-control" id="tanggalKardaluarsa" name="tanggal_kadaluarsa" value="{{ $obatKeluar->tanggal_kadaluarsa }}" />
                        </div>

                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan"
                                value="{{ $obatKeluar->tempats->nama_tempat ?? 'Tempat tidak ditemukan' }}" disabled />
                        </div>

                        <input type="hidden" name="id_tempat" value="{{ $obatKeluar->id_tempat }}" />

                        <div>
                            <button type="submit" class="btn btn-lg btn-info">Update</button>
                            <a href="{{ route('admin.data-obat-keluar', $obatKeluar->tempats->id) }}" class="btn btn-lg btn-warning">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection