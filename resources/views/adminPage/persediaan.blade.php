@extends('layouts.mainLayouts')
@section('container')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-right-to-bracket"></i> Tempat Tujuan</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a class="btn btn-primary btn-large" href="{{route('admin.tambah-persediaan')}}"><i class="fa-solid fa-plus"></i> Tambah</a>
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
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Tempat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tempat as $key => $tempat)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $tempat->nama_tempat }}</td>
                <td>
                  <a href="{{ route('admin.edit-persediaan', $tempat->id) }}" class="btn btn-sm btn-info">
                    <i class="fa-solid fa-file-pen"></i>
                  </a>
                  <form action="{{ route('admin.hapus-persediaan', $tempat->id) }}" method="POST" style="display:inline-block;" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="{{ route('admin.hapus-persediaan', $tempat->id) }}">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
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