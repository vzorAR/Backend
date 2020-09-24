<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return $product->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_to_insert = [
            'name' => $request->input('name'),
            'customer_id' => $request->input('customer_id'),
            'language_id' => $request->input('language_id'),
        ];

        Product::create($data_to_insert);

        return [
            'hasError' => false,
            'message' => 'Created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data_to_update = [
            'name' => $request->input('name'),
            'customer_id' => $request->input('customer_id'),
            'language_id' => $request->input('language_id'),
        ];

        $product->update($data_to_update);

        return [
            'hasError' => false,
            'message' => 'Updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Product::whereIn('id', explode(',', $ids))->delete();

        return [
            'hasError' => false,
            'message' => 'Deleted'
        ];
    }
}
