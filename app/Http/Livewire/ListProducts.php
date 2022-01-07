<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ListProducts extends Component
{
    public $productId;
    public $name;
    public $price;
    public $desc;
    public $image;

    public function render()
    {
        $product = Product::get()->take(4);
        return view('livewire.list-products', compact('product'));
    }

    public function getData($id)
    {
        $product = Product::find($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->desc = $product->description;
        $this->image = $product->image_url;
    }
}
