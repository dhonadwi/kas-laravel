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

    <form method="POST" action="{{ route('person-store') }}">
    @csrf
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" name="name" autofocus required>
      </div>
    <div class="form-group">
        <label>Cluster</label>
        <select name="cluster_id" id="cluster_id" class="form-control" required>
            @foreach ($clusters as $cluster)
                <option value="{{ $cluster->id }}">{{ $cluster->name }}</option>
            @endforeach
        </select>
      </div>
    <div class="form-group">
        <label>No Rumah</label>
        <input type="text" class="form-control" name="no_rumah" required>
      </div>
    
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('person') }}" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection

