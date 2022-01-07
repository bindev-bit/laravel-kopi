<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        View::composer('*', function ($view) {
            if (auth()->check()) {
                $val = count(Cart::where('user_id', auth()->user()->id)->get());
                $view->with('total_cart', $val);
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
