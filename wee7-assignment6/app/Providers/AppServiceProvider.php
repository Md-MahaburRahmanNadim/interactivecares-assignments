<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('min_if_not_null', function ($attribute, $value, $parameters, $validator) {
    // Check if the value is not null
    if ($value !== null) {
        // If not null, apply the 'min' rule
        $minRule = Validator::make([$attribute => $value], [
            $attribute => "min:$parameters[0]",
        ]);

       // if fails the rule then show the error message
        if ($minRule->fails()) {
            $validator->errors()->add($attribute, $minRule->errors()->first($attribute));
        }
        return !$minRule->fails();
    }

    // If the value is null, validation passes
    return true;
});
    }
}