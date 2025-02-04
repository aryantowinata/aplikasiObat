@extends('layouts.mainLayouts')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fa-solid fa-pen-to-square"></i> Laporan</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="fa-solid fa-file-circle-plus"></i> Laporan
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
                    <form action="{{ route('admin.cetak') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Menu</label>
                            <select class="custom-select" name="menu">
                                <option value="">-- Pilih --</option>
                                <option value="data_obat">Data Obat</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal_awal" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="sd">S/D</label>
                                    <input type="date" class="form-control" id="sd" name="tanggal_akhir" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-lg btn-info" type="submit"><i class="fa-solid fa-print"></i> Cetak</button>
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