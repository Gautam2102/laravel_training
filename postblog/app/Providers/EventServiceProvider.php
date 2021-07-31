<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\ProductObserver;
use App\Observers\BlogObserver;
use App\Observers\logObserver;

use App\Models\Product;
use App\Models\User;
use App\Models\Admin;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Event\UserCreate'=>[
            'App\Listner\SendEmail'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        Product::observe(ProductObserver::class);
        User::observe(BlogObserver::class);
        Admin::observe(logObserver::class);
    }
}
