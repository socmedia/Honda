<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Banner\Repository\BannerRepositoryInterface;
use Modules\Banner\Repository\Model\BannerModel;
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
        $this->app->bind(BannerRepositoryInterface::class, BannerModel::class);
    }
}