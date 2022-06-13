<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{


    public function indexAdmin()
    {
        $cartAdmin = Cart::all();
        return view('admin.cart.index', compact('cartAdmin'));
    }

    public function listCart(Request $request){
        
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        $total = Cart::where('user_id', Auth::user()->id)->sum('total_price');
        return view('clients.cart', compact('cart','total'));
    }


    public function removeAdminCart($id)
    {
        Cart::destroy($id);
        return redirect(route('cartadmin.index'));
    }
      public function removeClientdminCart($id)
    {
        Cart::destroy($id);
        return redirect(route('cart.index'));
    }



}
