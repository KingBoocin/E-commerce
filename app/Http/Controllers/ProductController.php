<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index()
    {
        $data= Product::all();
        
        return view('product',['products'=>$data]);
    }
    
    function detail($id)
    {
        $data =Product::find($id);
        return view('detail',['product'=>$data]);
    }

    function search(Request $req)
    {
        
        $data= Product::where('nama', 'like', '%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }

    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        $userId=session()->get('user')['id'];
        return cart::where('user_id',$userId)->count();
    }

    function cartList()
    {
        $userId=session()->get('user')['id'];
        $products=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow()
    {
        $userId=session()->get('user')['id'];
        $total= $products=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.harga');

        return view('ordernow',['total'=>$total]);
    }

    function orderPlace(Request $req)
    {
        $userId=session()->get('user')['id'];
        $allCart= cart::where('user_id',$userId)->get();
        foreach($allCart as $cart)
        {
            $order= new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->jenis_pembayaran=$req->pembayaran;
            $order->status_pembayaran="pending";
            $order->alamat=$req->alamat;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        $req->input();
        return redirect('/');
    }

    function myOrders()
    {
        $userId=session()->get('user')['id'];
        $orders= DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();

        return view('myorders',['orders'=>$orders]);
    }
}
