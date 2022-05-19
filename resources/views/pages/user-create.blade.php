@extends('layouts.app')

@section('title','user')

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

    <form method="POST" action="{{ route('user-store') }}"> 
      {{-- {{ route('user-store') }} --}}
    @csrf
    <div class="form-group">
        <label for="name" class="col-md-4 col-form-label text-md-end">Nama Lengkap</label>
            <div class="col-md-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
      </div>
    <div class="form-group">
      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

      <div class="col-md-12">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      </div>
    <div class="form-group">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Hak Akses') }}</label>
        <div class="col-md-12">
        <select name="roles" class="form-control">
          <option value="USER">USER</option>
          <option value="ADMIN">ADMIN</option>
        </select>
        </div>
      </div>
    
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('user') }}" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection

