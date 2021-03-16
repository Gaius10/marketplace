<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request) 
    {
        $product = $request->get('product');
        if (session()->has('cart')) {

            $cart = session()->get('cart');
            $cartSlugs = array_column($cart, 'slug');

            if (in_array($product['slug'], $cartSlugs)) {
                $cart = $this->productIncrement($product['slug'], $product['amount'], $cart);
            } else {
                $cart[] = $product;
            }

            
        } else {
            $cart = [$product];
        }

        session()->put('cart', $cart);

        flash('Produto adicionado ao carrinho.')->success();
        return redirect()->route('product.single', ['slug' => $product['slug']]);
    }

    public function remove($slug)
    {
        if (!session()->has('cart')) {
            return back();
        }

        $cart = session()->get('cart');
        $cart = array_filter($cart, function($product) use ($slug){
            return $product['slug'] != $slug;
        });

        session()->put('cart', $cart);
        return back();
    }

    public function productIncrement($slug, $amount, $cart)
    {
        return array_map(function($product) use ($slug, $amount) {
            if ($slug === $product['slug']) {
                $product['amount'] += $amount;
                return $product;
            }
        }, $cart);
    }
}
