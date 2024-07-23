<?php

namespace App\Providers;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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

        Model::preventLazyLoading();
        // Gate::define('edit_gate', function(User $user, JobListing $job)
        // {
        //    return $job->employer->user->is($user);
        // });
    }
}
