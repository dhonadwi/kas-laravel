@extends('layouts.app')

@section('title','transaction')

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
    <h3>Transaksi</h3>
    <form method="POST" action="{{ Auth::user()->roles == 'ADMIN' ? route('person-transaction-store') : route('checkout')}}">
    @csrf
        <div class="form-group">
            <label for="idBuku">Nama Lengkap</label>
            <input type="text" class="form-control" disabled value="{{ $person->name }}">
            <input type="text" class="form-control" name="user_id" hidden value="{{ $person->id }}">
        </div>
        <div class="form-group">
            <label for="idBuku">Nominal</label>
            <input type="number" class="form-control" name="nominal" autofocus required>
        </div>
        <div class="form-group">
            <label for="idBuku">Keterangan</label>
            <input type="text" class="form-control" name="description" required>
        </div>
    
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('person') }}" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection

