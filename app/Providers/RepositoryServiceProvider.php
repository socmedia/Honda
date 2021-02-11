<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Ahass\Repository\AhassRepositoryInterface;
use Modules\Ahass\Repository\Model\AhassModel;
use Modules\Apparel\Repository\ApparelRepositoryInterface;
use Modules\Apparel\Repository\Model\ApparelModel;
use Modules\Banner\Repository\BannerRepositoryInterface;
use Modules\Banner\Repository\Model\BannerModel;
use Modules\Dealer\Repository\DealerRepositoryInterface;
use Modules\Dealer\Repository\Model\DealerModel;
use Modules\HGP\Repository\GenuinePartRepositoryInterface;
use Modules\HGP\Repository\Model\GenuinePartModel;
use Modules\Product\Repository\Model\ProductModel;
use Modules\Product\Repository\ProductRepositoryInterface;
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
        $this->app->bind(ProductRepositoryInterface::class, ProductModel::class);
        $this->app->bind(AhassRepositoryInterface::class, AhassModel::class);
        $this->app->bind(DealerRepositoryInterface::class, DealerModel::class);
        $this->app->bind(GenuinePartRepositoryInterface::class, GenuinePartModel::class);
        $this->app->bind(ApparelRepositoryInterface::class, ApparelModel::class);
    }
}