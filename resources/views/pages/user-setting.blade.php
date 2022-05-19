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

    <form method="POST" action="{{ route('user-update', $user->id) }}">
    @method('PUT')
    @csrf
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
@endsection

