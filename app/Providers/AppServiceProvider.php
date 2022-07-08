<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\BeritaObserver;
use App\Berita;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Berita::observe(BeritaObserver::class);
        Blade::directive('currency', function ($money) {
            return "<?php echo number_format($money,2,',','.') ?>";
        });
    }
}
