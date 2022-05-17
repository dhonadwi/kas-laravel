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
<a href="{{ route('cluster-add') }}" class="btn btn-success">Tambah</a>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Cluster</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableCluster" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Cluster</th>
                            <th>Nama Cluster</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($clusters as $cluster)
                        <tr>
                            <td>{{ $cluster->id }}</td>
                            <td>{{ $cluster->name }}</td>
                            <td> Aksi </td>
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
        $("#dataTableCluster").DataTable({
        ordering: true,
    });
});
    </script>
@endpush