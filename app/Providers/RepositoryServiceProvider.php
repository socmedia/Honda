<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Setting\Repository\Model\SettingModel;
use Modules\Setting\Repository\SettingRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SettingRepositoryInterface::class, SettingModel::class);
    }
}
