@extends('layouts.mainLayouts')
@section('container')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-folder"></i> Data Obat</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a class="btn btn-primary btn-large" href="{{route('admin.tambah-data-obat')}}"><i class="fa-solid fa-plus"></i> Tambah</a>
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
          <h3 class="card-title">Data Obat</h3>
        </div> -->
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode obat</th>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tanggal Kardaluarsa</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataObat as $index => $obat)
              <tr>
                <td data-label="No">{{ $index + 1 }}</td>
                <td data-label="Kode Obat">{{ $obat->kode_obat }}</td>
                <td data-label="Nama Obat">{{ $obat->nama_obat }}</td>
                <td data-label="Satuan">{{ $obat->satuan }}</td>
                <td data-label="Jumlah">{{ $obat->jumlah }}</td>
                <td data-label="Tanggal Kadaluarsa">{{ \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->format('d-m-Y') }}</td>
                <td data-label="Aksi">
                  <form action="{{ route('admin.hapus-data-obat', $obat->id_obat) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="{{ route('admin.hapus-data-obat', $obat->id_obat) }}">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                  <a href="{{ route('admin.edit-data-obat', $obat->id_obat) }}" class="btn btn-sm btn-info">
                    <i class="fa-solid fa-file-pen"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>



          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection