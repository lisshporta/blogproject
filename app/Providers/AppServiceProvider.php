<?php

namespace App\Providers;

use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AppServiceProvider extends ServiceProvider
{

     
    public function register()
    {
        
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

   
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function(User $user) {
            return $user->username == 'LisShporta';
    });

    }
}
