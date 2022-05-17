@extends('layouts.app')

@push('addon-style')
    <link href="{{ url('/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('title','history')

@section('content')
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{-- <a href="{{ route('person-add') }}" class="btn btn-success">Tambah</a> --}}
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            <h5>Total : {{ $total }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableHistory" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Bayar</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                <tbody>
                   @foreach ($history as $h)
                      <tr>
                        <td>{{ $h->person->name }}</td>
                        <td>{{ $h->date_transaction }}</td>
                        <td>{{ $h->nominal }}</td>
                        <td>{{ $h->description }}</td>
                      </tr>            
                   @endforeach                   
                </tbody>
                </table>
            </div>
        </div>
    </div> 
    
    
</div>
@endsection

@push('addon-script')
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
        $("#dataTableHistory").DataTable({
        ordering: true,
    });
});
    </script>
@endpush