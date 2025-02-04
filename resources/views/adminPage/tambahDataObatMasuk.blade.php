@extends('layouts.mainLayouts')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-pen-to-square"></i> Tambah Data Obat Masuk</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <i class="fa-solid fa-folder"></i> <a href="{{route('admin.data-obat-masuk')}}">Data Obat Masuk</a> > Tambah
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
        <!-- <div class="card-header">
    <h3 class="card-title"></h3>
  </div> -->
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{ route('admin.simpan.obat-masuk') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="kodeObatMasuk">Kode Obat Masuk</label>
              <input type="text" class="form-control" id="kodeObatMasuk" name="kode_obat_masuk" value="Digenerate Otomatis" disabled />
            </div>
            <div class="form-group">
              <label for="tanggalObatMasuk">Tanggal Obat Masuk</label>
              <input type="date" class="form-control" id="tanggalObatMasuk" name="tanggal_obat_masuk" />
            </div>
            <div class="form-group">
              <label for="kodeObat">Kode Obat</label>
              <select class="form-control" id="kodeObat" name="kode_obat">
                <option value="">Pilih Kode Obat</option>
                @foreach ($dataObatMasuk as $obat)
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
              <label for="jumlahObatMasuk">Jumlah Obat Masuk</label>
              <input type="number" class="form-control" id="jumlahObatMasuk" name="jumlah" />
            </div>
            <div class="form-group">
              <label for="tanggalKardaluarsa">Tanggal Kadaluarsa</label>
              <input type="date" class="form-control" id="tanggalKardaluarsa" name="tanggal_kadaluarsa" />
            </div>
            <button class="btn btn-lg btn-info" type="submit">Simpan</button>
            <a href="{{ route('admin.data-obat-masuk') }}" class="btn btn-lg btn-warning">Batal</a>
          </form>

        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection