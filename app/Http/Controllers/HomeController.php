<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    
    /**
     * Undocumented variable
     *
     * @var App\Http\Models\Product
     */
    private $product;

    function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function index()
    {
        $products = $this->product->limit(8)->get();
        return view('welcome', compact('products'));
    }

    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first();
        $recommendations = $this->product->limit(4)->get();

        return view('single', compact('product', 'recommendations'));
    }
}
