<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
     public function store(Request $request) {
         $cartDetail = new CartDetail();
         $cartDetail->cart_id = auth()->user()->cart->id;
         $cartDetail->product_id = $request->product_id;
         $cartDetail->quantity = $request->quantity;
         $cartDetail->save();

         $notification = 'El producto se ha cargado a tu carrito de compras exitosamente.';
         return back()->with(compact('notification'));
     }

     public function destroy(Request $request) {
         $detail = CartDetail::find($request->cart_detail_id);

         if ($detail->cart_id == auth()->user()->cart->id) {
             $detail->delete();
         }

         $notification = 'El producto se ha eliminado del carrito de compras satisfactoriamente.';
         return back()->with(compact('notification'));
     }
}
