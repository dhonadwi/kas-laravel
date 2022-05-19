@extends('layouts.app')

@push('addon-style')
    <link href="{{ url('/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('title','cluster')

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
<a href="{{ route('person-add') }}" class="btn btn-success">Tambah</a>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penghuni</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTablePerson" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Cluster</th>
                            <th>No Rumah
                            <th>Total Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($person as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->cluster->name }}</td>
                        <td>{{ $p->no_rumah }}</td>
                        <td>@currency($p->total)</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('person-transaction',$p->id) }}">Transaksi</a>
                                    <a class="dropdown-item" href="{{ route('person-edit', $p->id) }}">History</a>
                                </div>
                            </div>
                        </td>
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
        $("#dataTablePerson").DataTable({
        ordering: true,
    });
});
    </script>
@endpush