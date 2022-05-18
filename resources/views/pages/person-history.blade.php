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
                <table class="table table-bordered" id="dataTablePerson" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Cluster</th>
                            <th>No Rumah</th>
                            <th>Transaksi</th>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->cluster->name }}</td>
                        <td>{{ $person->no_rumah }}</td>
                        <td>
                          <table class="table table-bordered">
                            <thead>
                              <th>Tanggal</th>
                              <th>Nominal</th>
                              <th>Keterangan</th>
                            </thead>
                            <tbody>
                              @foreach ($person->transaction as $t)
                              <tr>
                                <td>{{ $t->date_transaction}}</td>
                                <td>@currency($t->nominal)</td>
                                <td>{{ $t->description}}</td>
                              </tr>
                                @endforeach
                            </tbody>
                          </table>
                          </ul>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
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