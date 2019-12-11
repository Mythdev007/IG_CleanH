<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Modules\Platform\Core\ViewComposers\MainMenuComposer;
use Modules\Platform\Settings\ViewComposers\SettingsMenuComposer;
use Modules\Subscription\ViewComposers\SubscriptionMenuComposer;

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


        if(config('vaance.force_ssl')){
            URL::forceScheme('https');
        }

        Validator::extend('recaptcha', 'App\Validators\ReCaptcha@validate');

        Validator::extend('multi_email', function ($attribute, $value, $parameters, $validator) {

            $emails = explode(',',$value);

            foreach ($emails as  $email){
                $valid = filter_var($email, FILTER_VALIDATE_EMAIL);

                if(!$valid){
                    return false;
                }
            }

            return true;
        });

        \View::composer(
            'partial.left-sidebar',
            MainMenuComposer::class
        );

        \View::composer(
            'settings::partial.menu',
            SettingsMenuComposer::class
        );

        \View::composer(
            'subscription::partial.menu',
            SubscriptionMenuComposer::class
        );

        \Blade::if('issetvaance', function ($array, $key) {
            if (array_key_exists($key, $array)) {
                return isset($array[$key]) && $array[$key];
            }
        });


        \Blade::if('fieldPermission', function ($options) {

            if (isset($options['permission']) && \Auth::user()->hasPermissionTo($options['permission'])) {
                return true;
            }
            if (!isset($options['permission'])) {
                return true;
            }
            return false;
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
