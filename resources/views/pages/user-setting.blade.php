@extends('layouts.app')

@section('title','person')

@section('content')
 @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#user" data-toggle="tab">User</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Passwod</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="user">
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
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="password">
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
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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