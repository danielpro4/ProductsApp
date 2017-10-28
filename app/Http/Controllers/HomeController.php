<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::active()->orderBy('created_at', 'desc')->get();
        return view('pricing',  ['products' => $products]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function selling()
    {
        $products = Product::active()->orderBy('created_at', 'desc')->get();
        return view('selling',  ['products' => $products]);
    }
}
