@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{ $product['gallery'] }}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h2>{{ $product['nama'] }}</h2>
            <h3>Harga : {{ $product['harga'] }}</h3>
            <h4>Detail : {{ $product['deskripsi'] }}</h4>
            <h4>kategori : {{ $product['kategori'] }}</h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value={{ $product['id'] }}>
                <button class="btn btn-primary">Masukkan ke Keranjang</button>
            </form>
            <br><br>
            <button class="btn btn-success">Beli Sekarang</button>
            <br><br>
        </div>
    </div>
</div>
@endsection