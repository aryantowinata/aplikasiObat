@extends('layouts.mainLayouts')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-house"></i> Beranda</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <i class="fa-solid fa-house"></i> Beranda
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
      <div
        class="alert text-dark"
        role="alert"
        style="background-color: #75daf5">
        <i class="fa-solid fa-user"></i> Selamat Datang Petugas di Website
        Pencatatan Data Obat.
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $obat ?></h3>

              <p>Data Obat</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-folder"></i>
            </div>
            <a href="{{route('admin.dataObat')}}" class="small-box-footer"><i class="fa-solid fa-plus"></i></a>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $obatMasuk ?></h3>

              <p>Data Obat Masuk</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-right-to-bracket"></i>
            </div>
            <a href="{{route('admin.data-obat-masuk')}}" class="small-box-footer"><i class="fa-solid fa-plus"></i></a>
          </div>
        </div>
        <div class="col-lg-3 ">
          <div class="small-box bg-warning ">
            <div class="inner text-light">
              <h3>{{ $tujuanPertama ? $obatKeluar : '0' }}</h3>
              <p>Data Obat Keluar</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-right-to-bracket"></i>
            </div>
            <a href="{{ $tujuanPertama ? route('admin.data-obat-keluar', ['id' => $tujuanPertama->id]) : route('admin.persediaan') }}" class="small-box-footer ">
              <i class="fa-solid fa-plus text-light"></i>
            </a>
          </div>

        </div>
        <div class="col-lg-3">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $tempatTujuan ?></h3>

              <p>Tempat Tujuan</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-house"></i>
            </div>
            <a href="{{ route('admin.persediaan') }}" class="small-box-footer"><i class="fa-solid fa-plus"></i></a>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection