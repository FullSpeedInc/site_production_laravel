<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DevelopServiceProvider extends ServiceProvider
{
    /** @var array */
    protected $providers = [
        // 開発時に利用するサービスプロバイダを記述します
        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
        'Barryvdh\Debugbar\ServiceProvider'
    ];

    public function register()
    {
        // APP_ENVがlocalの場合にのみサービスプロバイダを登録します
        if ($this->app->isLocal()) {
            $this->registerServiceProviders();
        }
    }

    protected function registerServiceProviders()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}