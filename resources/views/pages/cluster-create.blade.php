@extends('layouts.app')

@section('title','cluster')

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

    <form method="POST" action="{{ route('cluster-store') }}">
    @csrf
    <div class="form-group">
        <label for="idBuku">Nama Cluster</label>
        <input type="text" class="form-control" name="name" autofocus required>
      </div>
    
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('cluster') }}" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection

