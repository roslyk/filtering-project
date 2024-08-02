<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {

        // Returns the view at "products.index.blade.php" 
        return view("products.index");
    
    }
}
