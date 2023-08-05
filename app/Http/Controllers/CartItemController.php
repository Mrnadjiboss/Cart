<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function addToCart(Product $product)
    {
        // Check if the product is already in the cart
        $cartItem = CartItem::where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create(['product_id' => $product->id]);
        }

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function removeFromCart(Product $product)
    {
        // Find the cart item for the product
        $cartItem = CartItem::where('product_id', $product->id)->first();

        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}
