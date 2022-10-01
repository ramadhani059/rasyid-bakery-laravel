<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class ConsumenController extends Controller
{
    function home()
    {
        $pageTitle = 'Home | Rasyid Bakery';
        return view('home/index', ['pageTitle' => $pageTitle]);
    }
    function produk()
    {
        $pageTitle = 'Product | Rasyid Bakery';

        $category = Categorie::all();
        $product = Product::all();

        return view('product/index', [
            'pageTitle' => $pageTitle,
            'category' => $category,
            'product' => $product,
        ]);
    }
    
}
