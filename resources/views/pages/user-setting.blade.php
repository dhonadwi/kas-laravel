@extends('layouts.app')

@section('title','person')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">User</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Password</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="container">
        <div class="card shadow p-5 mb-4 mt-2">
            <form method="POST" action="{{ route('user-update') }}">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" disabled>
                </div>
                <div class="form-group">
                    <label>No Rumah</label>
                    <input type="text" class="form-control" name="no_rumah" value="{{ old('no_rumah', $user->no_rumah) }}" required>
                </div>
                <div class="form-group">
                    <label>No Handphone</label>
                    <input type="number" class="form-control" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" required>
                </div>
                
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
            </form>
        </div>
       </div>
  </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <div class="container">
            <div class="card shadow p-5 mb-4 mt-2">
                <form method="POST" action="{{ route('user-update-pass') }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" id="pass1" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="pass2" required>
                    </div>
                    
                        <button type="submit" class="btn btn-success" id="btnSubmit" disabled>Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
       </div>
    </div>

</div>
@endsection

@push('addon-script')
    <script>
        const pass1 = document.querySelector('#pass1');
        const pass2 = document.querySelector("#pass2");
        const btnSubmit = document.querySelector("#btnSubmit");

        pass2.addEventListener('keyup',() => {
            if(pass1.value == pass2.value)
            {
                btnSubmit.disabled = false;
            } else {
                btnSubmit.disabled = true;
            }
        })
        pass1.addEventListener('keyup',() => {
            if(pass1.value == pass2.value)
            {
                btnSubmit.disabled = false;
            } else {
                btnSubmit.disabled = true;
            }
        })
    </script>
@endpush