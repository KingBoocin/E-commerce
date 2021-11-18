@extends('master')
@section('content')
<div class="custom-product">
      <div class="col-sm-10">
        <table class="table">
            <tbody>
              <tr>
                <td>Amount</td>
                <td>RP {{ $total }}</td>
              </tr>
              <tr>
                <td>Tax</td>
                <td>RP 0</td>
              </tr>
              <tr>
                <td>Delivery</td>
                <td>RP 30000</td>
              </tr>
              <tr>
                <td>Total Amount</td>
                <td>RP {{ $total+30000 }}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <form action="/orderplace" method="POST">
                @csrf
                <div class="form-group">
                  <textarea name="alamat" placeholder=" enter your address" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Jenis Pembayaran</label> <br><br>
                  <input type="radio" value="cash" name="pembayaran"> <span>Pembayaran Online</span> <br><br>
                  <input type="radio" value="cash" name="pembayaran"> <span>Kartu Kredit</span> <br><br>
                  <input type="radio" value="cash" name="pembayaran"> <span>COD</span> <br><br>
                </div>
                <button type="submit" class="btn btn-default">Beli Sekarang</button>
              </form>
          </div>
      </div>
</div>
@endsection