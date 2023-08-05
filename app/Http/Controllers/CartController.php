<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function showCart()
    {
        // Get all cart items with related product information
        $cartItems = CartItem::with('product')->get();

        // Calculate the total price of the cart items
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart', compact('cartItems', 'cartTotal'));
    }
}
