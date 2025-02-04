@extends('layouts.mainLayouts')

@section('container')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-right-to-bracket"></i>Data Obat Keluar > {{ $currentLocation ?? 'Tempat Tidak Diketahui' }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a class="btn btn-primary btn-large" href="{{ route('admin.tambah-data-obat-keluar', $tempat->id) }}"><i class="fa-solid fa-plus"></i> Tambah</a>
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
          @if($dataObatKeluar->isEmpty())
          <div class="alert alert-warning" role="alert">
            Data tidak ada.
          </div>
          @else
          <table id="data1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Obat Keluar</th>
                <th>Tanggal Distribusi</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Tujuan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dataObatKeluar as $key => $obatKeluar)
              <tr>
                <td data-label="No">{{ $key + 1 }}</td>
                <td data-label="Kode Obat Keluar">{{ $obatKeluar->kode_obat_keluar }}</td>
                <td data-label="Tanggal Distribusi">{{ \Carbon\Carbon::parse($obatKeluar->tanggal_distribusi)->format('d-m-Y') }}</td>
                <td data-label="Kode Obat">{{ $obatKeluar->kode_obat }}</td>
                <td data-label="Nama Obat">{{ $obatKeluar->nama_obat }}</td>
                <td data-label="Satuan">{{ $obatKeluar->satuan }}</td>
                <td data-label="Jumlah">{{ $obatKeluar->jumlah }}</td>
                <td data-label="Tanggal Kadaluarsa">{{ \Carbon\Carbon::parse($obatKeluar->tanggal_kadaluarsa)->format('d-m-Y') }}</td>
                <td data-label="Tujuan">{{ $obatKeluar->tujuan }}</td>
                <td data-label="Aksi">
                  <a href="{{ route('admin.edit-data-obat-keluar', $obatKeluar->id) }}" class="btn btn-sm btn-info">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <form action="{{ route('admin.hapus-data-obat-keluar', $obatKeluar->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="{{ route('admin.hapus-data-obat-keluar', $obatKeluar->id) }}">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection