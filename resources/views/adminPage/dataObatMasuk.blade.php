@extends('layouts.mainLayouts')
@section('container')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-right-to-bracket"></i> Data Obat Masuk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a class="btn btn-primary btn-large" href="{{ route('admin.tambah-data-obat-masuk') }}"><i class="fa-solid fa-plus"></i> Tambah</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card card-outline card-info">
        <div class="card-body">
          <table id="data1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Obat Masuk</th>
                <th>Tanggal Masuk</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataObatMasuk as $key => $obatMasuk)
              <tr>
                <td data-label="No">{{ $key + 1 }}</td>
                <td data-label="Kode Obat Masuk">{{ $obatMasuk->kode_obat_masuk }}</td>
                <td data-label="Tanggal Masuk">{{ \Carbon\Carbon::parse($obatMasuk->tanggal_masuk)->format('d-m-Y') }}</td>
                <td data-label="Kode Obat">{{ $obatMasuk->kode_obat }}</td>
                <td data-label="Nama Obat">{{ $obatMasuk->nama_obat }}</td>
                <td data-label="Satuan">{{ $obatMasuk->satuan }}</td>
                <td data-label="Jumlah">{{ $obatMasuk->jumlah }}</td>
                <td data-label="Tanggal Kadaluarsa">{{ \Carbon\Carbon::parse($obatMasuk->tanggal_kadaluarsa)->format('d-m-Y') }}</td>
                <td data-label="Aksi">
                  <a href="{{ route('admin.edit-data-obat-masuk', $obatMasuk->id) }}" class="btn btn-sm btn-info">
                    <i class="fa-solid fa-file-pen"></i>
                  </a>
                  <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $obatMasuk->id }}" data-url="{{ route('admin.hapus-data-obat-masuk', $obatMasuk->id) }}">
                    <i class="fa-solid fa-trash"></i>
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
@endsection