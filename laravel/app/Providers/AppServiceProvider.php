<?php

namespace App\Providers;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product; 
use App\Models\Payment;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\OrderProduct;
use App\Models\Category;



use App\Observers\ModelActivityObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        // list of models to be observed
        $models = [
            Order::class,
            Customer::class,
            Product::class,
            Payment::class,
            Cart::class,
            Wishlist::class,
            OrderProduct::class,
            Category::class,

    
            // Add more models
        ];
    
        foreach ($models as $model) {
            $model::observe(ModelActivityObserver::class);
        }

        
    }
}
