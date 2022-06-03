@extends('layouts.login')

@section('title','Dashboard')
    
@section('content')
    <!-- Begin Page Content -->
                <div class="container-fluid">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                    <!-- Content Row -->
                    <div class="container mt-5">
<h4>Transaksi Midtrans</h4>
                    </div>




                </div>
                <!-- /.container-fluid -->
@endsection