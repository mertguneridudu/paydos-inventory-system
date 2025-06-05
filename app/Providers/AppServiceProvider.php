<?php

namespace App\Providers;
use Opcodes\LogViewer\Facades\LogViewer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {

        LogViewer::auth(function ($request) {
            return $request->user()
                && in_array($request->user()->email, [
                    'admin@admin.com'
            ]);
        });
        
    }
}
