<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::if('admin', function () {
            $userId = Auth::user()->id;

            $isAdmin = DB::table('users')
                        ->join('user_types', 'users.userType', '=', 'user_types.id')
                        ->where(
                            [
                                ['users.id','=',$userId],
                                ['user_types.description', '=', 'admin']
                            ])
                        ->exists();

            return $isAdmin;
        });        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this -> app -> bind('path.public', function()
        {
                return base_path('public_html');
        });
    }
}
