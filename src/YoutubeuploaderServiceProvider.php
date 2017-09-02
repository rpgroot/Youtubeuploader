<?php

namespace Rpgroot\Youtubeuploader;

use Illuminate\Support\ServiceProvider;

class YoutubeuploaderServiceProvider extends ServiceProvider
{

    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        echo "boot calle   ----   ";

        $config = realpath(__DIR__.'/../config/youtube.php');

        $this->publishes([$config => config_path('youtube.php')], 'config');

        $this->mergeConfigFrom($config, 'youtube');

        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations')
        ], 'migrations');

        if($this->app->config->get('youtube.routes.enabled')) {
            include __DIR__.'/../routes/web.php';
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        echo "register calle  ---   ";

        $this->app->singleton('youtubeuploader', function($app) {
            return new Youtubeuploader($app, new \Google_Client);
        });
        //
    }
}
