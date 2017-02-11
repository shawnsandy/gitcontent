<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/11/2017
     * Time: 12:37 PM
     */

    namespace ShawnSandy\GitContent\Stories;


    use Illuminate\Support\ServiceProvider;

    class StoriesProvider extends ServiceProvider
    {

        /**
         * Perform post-registration booting of services.
         *
         * @return void
         */
        public function boot()
        {

            /**
             *
             */
            $namespace = "git-stories";

            /**
             * Package views
             */
            $this->loadViewsFrom(__DIR__ . '/resources/views', $namespace);


            if (!$this->app->runningInConsole()) :
                include_once __DIR__ . '/helper.php';
            endif;

            $this->publish($namespace);


        }

        /**
         * Register any package services.
         *
         * @return void
         */
        public function register()
        {

            $this->mergeConfigFrom(
                __DIR__ . '/config/config.php', 'git-stories'
            );


//            $this->app->bind(
//            '__YOUR_FACADE_NAME__', function () {
//            return new YOUR_CLASS_NAME();
//            });

        }

        private function publish($namespace = 'apps')
        {

            $this->publishes(
                [
                    __DIR__ . '/resources/views' => resource_path('views/vendor/' . $namespace),
                ], $namespace . '-views'
            );

            /**
             * Package assets
             */
            $this->publishes(
                [
                    __DIR__ . '/resources/assets/js/' => public_path("assets/{$namespace}/js/"),
                    __DIR__ . '/public/assets/' => public_path('assets/')
                ], $namespace . '-assets'
            );

            /**
             * Package config
             */
            $this->publishes(
                [__DIR__ . '/config/config.php' => config_path("{$namespace}.php")],
                $namespace . '-config'
            );

        }

    }
