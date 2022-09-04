<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Catagory;
use App\Models\Pages;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;

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
        View::share('setting', SiteSetting::first());
        View::share('services', Service::latest('id')->get());
        View::share('pages', Pages::latest('id')->where('status', 1)->select('id', 'heading', 'slug')->get());
        View::share('catagory_menu', Catagory::select('id', 'catagory_name', 'catagory_image', 'slug')->inRandomOrder()->get());
        
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage())
                ->subject(' Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
    }
}
