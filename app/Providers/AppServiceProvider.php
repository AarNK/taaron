<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Laporan;

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
        // Share low stock items with admin layout views
        View::composer('layouts.admin.*', function ($view) {
            $lowStockItems = Laporan::with('barang')
                ->where('stokakhir', '<', 5)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
            $view->with('lowStockItems', $lowStockItems);
        });
    }
}
