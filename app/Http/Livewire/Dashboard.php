<?php

namespace App\Http\Livewire;

use App\Models\Checkout;
use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $listTransaction = Checkout::get()->take(5);
        $transactions = Checkout::all();
        $products = Product::all();

        return view('dashboard', compact(
            [
                'listTransaction',
                'transactions',
                'products'
            ]
        ));
    }
}
