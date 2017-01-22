<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 1/21/2017
     * Time: 3:39 PM
     */

    namespace ShawnSandy\GitContent\Classes;




    class Client  {

        protected static $instance;

        public static function getInstance(){

            if(is_null(static::$instance)) {

                static::$instance = new self();

            }

            return static::$instance ;

        }

        public function connect(){
            return "hello world...";
        }

    }
