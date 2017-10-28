<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::active()->orderBy('created_at', 'desc')->get();

        return response()->json(['products' => $products])
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK] );
    }


    /**
     * @param string $text
     * @return \Illuminate\Http\Response
     */
    public function search($text) {

        $products = Product::search($text)->get();

        return response()->json(['products' => $products])
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK] );
    }
}
