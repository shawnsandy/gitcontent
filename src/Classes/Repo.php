<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 1/23/2017
     * Time: 12:03 AM
     */

    namespace ShawnSandy\GitContent\Classes;


    class Repo extends GitClient
    {

        protected $repo;

        public function __construct()
        {
            parent::__construct();
            $this->repo = $this->client->api('repo');

        }

    }
