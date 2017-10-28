<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductsController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::active()->orderBy('created_at', 'desc')->get();

        return view($this->namespace . 'products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $product->active = 1;

        return view($this->namespace . 'products.form', [
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Product::$rules);

        $product = new Product();
        $product->fill($request->all());
        $product->user_id = Auth::user()->id;
        $product->save();

        return redirect()
            ->route($this->namespace . 'products.all')
            ->with('success', "Producto {$product->sku} registrado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function view(Product $product)
    {
        return view($this->namespace . 'products.view', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view($this->namespace . 'products.form', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();

        return view($this->namespace . 'products.all', [
            'product' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
