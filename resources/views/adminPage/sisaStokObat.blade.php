@extends('layouts.mainLayouts')
@section('container')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-floppy-disk"></i> Sisa Stok Obat</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
                <i class="fa-solid fa-floppy-disk"></i> Sisa Stok Obat
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
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tanggal Kardaluarsa</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>B000360</td>
                <td>Intunal</td>
                <td>Box</td>
                <td>100</td>
                <td>17-07-2025</td>
              </tr>
              <tr>
                <td>2</td>
                <td>B000360</td>
                <td>Intunal</td>
                <td>Box</td>
                <td>100</td>
                <td>17-07-2025</td>
              </tr>
              <tr>
                <td>3</td>
                <td>B000360</td>
                <td>Intunal</td>
                <td>Box</td>
                <td>100</td>
                <td>17-07-2025</td>
              </tr>
              <tr>
                <td>4</td>
                <td>B000360</td>
                <td>Intunal</td>
                <td>Box</td>
                <td>100</td>
                <td>17-07-2025</td>
              </tr>
              <tr>
                <td>5</td>
                <td>B000360</td>
                <td>Intunal</td>
                <td>Box</td>
                <td>100</td>
                <td>17-07-2025</td>
              </tr>
              <tr>
                <td>6</td>
                <td>B000360</td>
                <td>Intunal</td>
                <td>Box</td>
                <td>100</td>
                <td>17-07-2025</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tanggal Kardaluarsa</th>
              </tr>
            </tfoot>
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