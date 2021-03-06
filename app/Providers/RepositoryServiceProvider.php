<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Accessories\Repository\AccessoryRepositoryInterface;
use Modules\Accessories\Repository\Model\AccessoryModel;
use Modules\Ahass\Repository\AhassRepositoryInterface;
use Modules\Ahass\Repository\Model\AhassModel;
use Modules\Apparel\Repository\ApparelRepositoryInterface;
use Modules\Apparel\Repository\Model\ApparelModel;
use Modules\Article\Repository\ArticleRepositoryInterface;
use Modules\Article\Repository\Model\ArticleModel;
use Modules\Banner\Repository\BannerRepositoryInterface;
use Modules\Banner\Repository\Model\BannerModel;
use Modules\Dealer\Repository\DealerRepositoryInterface;
use Modules\Dealer\Repository\Model\DealerModel;
use Modules\HGP\Repository\GenuinePartRepositoryInterface;
use Modules\HGP\Repository\Model\GenuinePartModel;
use Modules\Lead\Repository\LeadRepositoryInterface;
use Modules\Lead\Repository\Model\LeadModel;
use Modules\Product\Repository\Model\ProductModel;
use Modules\Product\Repository\ProductRepositoryInterface;
use Modules\Promo\Repository\Model\PromoModel;
use Modules\Promo\Repository\PromoRepositoryInterface;
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
        $this->app->bind(AccessoryRepositoryInterface::class, AccessoryModel::class);
        $this->app->bind(LeadRepositoryInterface::class, LeadModel::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleModel::class);
        $this->app->bind(PromoRepositoryInterface::class, PromoModel::class);
    }
}