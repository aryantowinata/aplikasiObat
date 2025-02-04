<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('dist/css/style.css')}}" />
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #249fc1">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.profile') }}">
            <img src="{{ $user->foto_profile ? asset('storage/' . $user->foto_profile) : asset('default.jpg') }}" alt="Foto Profil" class="rounded-circle" style="width: 30px; height: 30px;" />
            {{ $user->name }} <!-- Menampilkan username atau nama pengguna -->
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-primary" style="background-color: black">
      <!-- Brand Logo -->
      <a href="#" class="brand-link" style="background-color: #249fc1">
        <div class="brant-text text-center font-weight-bold h1">SIPEDABAT</div>
      </a>
      <!-- Sidebar -->
      <div class="sidebar text-light">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mb-3 d-flex">
          <div class="info">
            <div class="d-block">Main Menu</div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{route('admin.beranda')}}" class="nav-link <?= ($menuName == 'beranda') ? "active" : "" ?>">
                <i class="fa-solid fa-house"></i>&nbsp;
                <p>Beranda</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.dataObat')}}" class="nav-link <?= ($menuName == 'data-obat') ? "active" : "" ?>">
                <i class="fa-solid fa-folder"></i>&nbsp;
                <p>Data Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.data-obat-masuk')}}" class=" nav-link <?= ($menuName == 'data-obat-masuk') ? "active" : "" ?>">
                <i class="fa-solid fa-right-to-bracket"></i>&nbsp;
                <p>Data Obat Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.persediaan')}}" class="nav-link <?= ($menuName == 'persediaan') ? "active" : "" ?>">
                <i class="fa-solid fa-clipboard-list"></i>&nbsp;
                <p>Tempat Tujuan</p>
              </a>
            </li>
            <li class="nav-item <?= ($submenu) ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= ($submenu) ? 'active' : '' ?>">
                <i class="fa-solid fa-right-from-bracket"></i>&nbsp;
                <p>
                  Data Obat Keluar
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @foreach ($tujuan as $index => $tujuan)
                <li class="nav-item">
                  <a href="{{ route('admin.data-obat-keluar', ['id' => $tujuan->id]) }}"
                    class="nav-link <?= ($menuName == $tujuan->nama_tempat) ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $tujuan->nama_tempat }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>


            <li class="nav-item">
              <a href="{{route('admin.laporan')}}" class="nav-link <?= ($menuName == 'laporan') ? "active" : "" ?>">
                <i class="fa-solid fa-file-circle-exclamation"></i>&nbsp;
                <p>Laporan</p>
              </a>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-link" style="color: white; text-decoration: none;">
                  <i class="fa-solid fa-sign-out-alt"></i>&nbsp;
                  <p>Keluar</p>
                </button>
              </form>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- content awal -->
    @yield('container')
    <!-- conten akhir -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline"></div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021
        <a href="#">@nfatur07</a>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>

  <script>
    // Ketika kode obat dipilih
    $('#kodeObat').on('change', function() {
      var selectedOption = $(this).find('option:selected'); // Mengambil option yang dipilih
      var namaObat = selectedOption.data('nama'); // Mengambil nama obat dari data atribut


      // Isi field nama obat dengan nama obat yang dipilih
      $('#namaObat').val(namaObat);

    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // SweetAlert untuk konfirmasi penghapusan
      const deleteButtons = document.querySelectorAll('.btn-delete');

      deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
          const deleteUrl = this.getAttribute('data-url');

          Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              const form = document.createElement('form');
              form.method = 'POST';
              form.action = deleteUrl;

              const csrfInput = document.createElement('input');
              csrfInput.type = 'hidden';
              csrfInput.name = '_token';
              csrfInput.value = '{{ csrf_token() }}';

              const methodInput = document.createElement('input');
              methodInput.type = 'hidden';
              methodInput.name = '_method';
              methodInput.value = 'DELETE';

              form.appendChild(csrfInput);
              form.appendChild(methodInput);

              document.body.appendChild(form);
              form.submit();
            }
          });
        });
      });

      // SweetAlert untuk pesan sukses
      @if(session('success'))
      Swal.fire({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
      });
      @endif
    });
  </script>
</body>

</html>