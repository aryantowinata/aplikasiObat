@extends('layouts.mainLayouts')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-pen-to-square"></i> Tambah Data Obat</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <i class="fa-solid fa-folder"></i> <a href="{{ route('admin.dataObat') }}">Data Obat</a> > Tambah
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
          <form action="{{ route('admin.simpan-data-obat') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="kodeObat">Kode Obat</label>
              <input
                type="text"
                class="form-control"
                id="kodeObat"
                name="kode_obat"
                placeholder="Akan di-generate otomatis"
                disabled />
            </div>
            <div class="form-group">
              <label for="namaObat">Nama Obat</label>
              <input
                type="text"
                class="form-control"
                id="namaObat"
                name="nama_obat"
                required />
            </div>
            <div class="form-group">
              <label for="satuan">Satuan</label>
              <input
                type="text"
                class="form-control"
                id="satuan"
                name="satuan"
                required />
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input
                type="number"
                class="form-control"
                id="jumlah"
                name="jumlah"
                required />
            </div>
            <div class="form-group">
              <label for="tanggalKardaluarsa">Tanggal Kardaluarsa</label>
              <input
                type="date"
                class="form-control"
                id="tanggalKardaluarsa"
                name="tanggal_kadaluarsa"
                required />
            </div>
            <div>
              <button type="submit" class="btn btn-lg btn-info">Simpan</button>
              <a href="{{ route('admin.dataObat') }}" class="btn btn-lg btn-warning">Batal</a>
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