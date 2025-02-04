@extends('layouts.mainLayouts')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fa-solid fa-pen-to-square"></i> Tambah Persediaan</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="fa-solid fa-clipboard-list"></i> <a href="{{route('admin.persediaan')}}">Persediaan</a> > Tambah
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
                    <form action="{{ route('admin.update-persediaan', $tempat->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="namaTempat">Nama Tempat</label>
                            <input type="text" class="form-control" id="nama_tempat" name="nama_tempat" value="{{ $tempat->nama_tempat }}" />
                        </div>

                        <div>
                            <button class="btn btn-lg btn-info">Simpan</button>
                            <a href="{{ route('admin.persediaan') }}" class="btn btn-lg btn-warning">Batal</a>

                        </div>
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