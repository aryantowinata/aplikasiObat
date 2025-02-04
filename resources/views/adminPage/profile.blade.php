@extends('layouts.mainLayouts')

@section('container')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa-solid fa-house"></i> Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <i class="fa-solid fa-house"></i> <a href="{{ route('admin.profile') }}">Beranda</a> > Profile
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
          @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif


          <form action="{{ route('admin.updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Username</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required />
            </div>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}" />
            </div>
            <div class="form-group">
              <label for="telepon">Telepon</label>
              <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $user->telepon }}" />
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $user->jabatan }}" />
            </div>
            <div class="form-group">
              <label for="file">Foto Profil</label><br />
              <img src="{{ $user->foto_profile ? asset('storage/' . $user->foto_profile) : 'default.jpg' }}" alt="Foto Profil" class="rounded-circle mb-1 profile-pic" /><br />
              <input type="file" id="file" name="file" />
            </div>

            <div>
              <button class="btn btn-lg btn-info">Simpan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection