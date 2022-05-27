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
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $person->name }}</td>
                        </tr>
                        <tr>
                            <th>Cluster</th>
                            <td>{{ $person->cluster->name }}</td>
                        </tr>
                        <tr>
                            <th>No Rumah</th>
                            <td>{{ $person->no_rumah }}</td>
                        </tr>
                        <tr>
                            <th>No Hanphone</th>
                            <td>{{ $person->no_hp }}</td>
                        </tr>
                    </tbody>
                </table>
                <h4>Transaksi</h4>
                        <table class="table table-bordered" id="dataTablePerson">
                            <thead>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach ($person->transaction as $t)
                            <tr>
                                <td>{{ $t->created_at}}</td>
                                <td>@currency($t->nominal)</td>
                                <td>{{ $t->description}}</td>
                                <td>{{ $t->status}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                      </table>
                    </td>
                    </tr>
            </div>
            <a class="btn btn-success" href="{{ route('person-transaction',$person->id) }}">Transaksi</a>
            <a href="{{ route('person') }}" class="btn btn-primary">Kembali</a>
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
        ordering: false,
    });
});
    </script>
@endpush