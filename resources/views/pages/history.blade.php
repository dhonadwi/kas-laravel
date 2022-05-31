@extends('layouts.app')

@push('addon-style')
    <link href="{{ url('/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('title','history')

@section('content')
<div class="container mt-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('message'))
       <div class="alert alert-success">
            {{ session()->get('message') }}
        </div> 
    @endif
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pemasukan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pengeluaran</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab"  href="#" role="tab" aria-controls="pills-profile" aria-selected="false">Saldo : @currency($saldo) </a>
            </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card shadow mb-4 mt-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                    <h5>Total : @currency($total)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableHistory" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Cluster</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach ($history as $h)
                            <tr>
                                <td>{{ $h->user->name }}</td>
                                <td>{{ $h->user->cluster->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($h->created_at)->format('j-M-Y H:m:s') }}</td>
                                <td>@currency($h->nominal)</td>
                                <td>{{ $h->description }}</td>
                                <td>{{ $h->status }} 
                                    @if ($h->status == 'pending') 
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <form action="{{ route('update-status') }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $h->id }}">
                                                    <button class="dropdown-item" type="submit" name="button" value="cancel">Cancel</button>
                                                    <button class="dropdown-item" type="submit" name="button" value="success">Success</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif    
                                </td>
                            </tr>            
                        @endforeach                   
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card shadow mb-4 mt-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
                    <h5>Total : @currency($total_expense)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableExpense" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach ($expense as $e)
                            <tr>
                                {{-- <td>{{ \Carbon\Carbon::parse($e->date_transaction)->format('j F, Y') }}</td> --}}
                                <td>{{ \Carbon\Carbon::parse($e->created_at)->format('j-M-Y') }}</td>
                                <td>@currency($e->nominal)</td>
                                <td>{{ $e->description }}</td>
                            </tr>            
                        @endforeach                   
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
 $(document).ready(function () {
        $("#dataTableExpense").DataTable({
        ordering: true,
    });
});
    </script>
@endpush