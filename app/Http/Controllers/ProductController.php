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
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:products|string|max:255',
            'price' => 'required',
            'description' => 'required|string',
            'image_url' => 'required|image|file|max:10240',
        ]);

        if ($request->file('image_url')) {
            $validateData['image_url'] = $request->file('image_url')->store('product-image');
        }

        Product::create($validateData);

        session()->flash('flash.banner', 'New product has been added !');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $validateData = $request->validate([
            'name' => 'required|string|max:255|unique:products' . ',id,' . $product->id,
            'price' => 'required',
            'description' => 'required|string',
            'image_url' => 'image|file|max:10240',
        ]);

        if ($request->file('image_url')) {
            $validateData['image_url'] = $request->file('image_url')->store('product-image');
        } else {
            $validateData['image_url'] = $product->image_url;
        }

        $product->update($validateData);

        session()->flash('flash.banner', 'New product has been updated !');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        session()->flash('flash.banner', 'Product has been removed !');
        session()->flash('flash.bannerStyle', 'danger');
        return redirect()->back();
    }
}
