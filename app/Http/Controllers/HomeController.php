<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Giả sử bạn có model Product

class HomeController extends Controller
{
    public function index()
    {
        // Lấy 3 sản phẩm nổi bật (featured)
        $featuredProducts = Product::where('is_featured', 1)->take(3)->get();

        return view('home', compact('featuredProducts'));
    }
}
