@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Transaksi</h3>
    <form action="{{ route('tambah-transaksi') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="namaPenyewa">Nama Penyewa</label>
        <input type="text" class="form-control" name="nama" required autofocus>
      </div>
      <div class="form-group">
        <label for="noHp">No HP</label>
        <input type="number" class="form-control" name="hp" required>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="alamat" required></textarea>
      </div>
      <div class="form-group">
        <label for="alamat">Data Buku</label>
        @for ( $i=1 ;  $i <= 5 ; $i++)
        <select class="custom-select mb-2" name="data_buku[]" id="data_buku_{{ $i }}" onchange="total()">
            <option value="">Pilih Buku ....</option>
            @foreach ($books as $book)
            <option value="{{ $book['judul_buku'] }},{{ $book['harga'] }}">{{ $book['judul_buku'] }}</option>
            @endforeach
        </select>
        @endfor
      </div>
      <p>Total Harga Sewa : Rp. <span id='harga'>0</span></p>
      <input type="text" value="" name="harga" id="hargaHidden" hidden>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@push('addon-script')
    <script>
      const hargaHidden = document.querySelector('#hargaHidden');
      let harga = document.querySelector('#harga');

      const total = () => {
        let jumlah = 0;
        for(let i = 1; i <= 5; i++) {
          if(document.querySelector(`#data_buku_${i}`).value != '') {
          const tes = document.querySelector(`#data_buku_${i}`).value.replace(/^\[\'|\'\]$/g,'').split(",");
          jumlah += +tes[1];
          console.log(tes)
          }
        }
         harga.innerHTML = jumlah;
         hargaHidden.value = jumlah;
      }
    </script>
@endpush