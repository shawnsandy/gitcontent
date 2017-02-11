<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 1/23/2017
     * Time: 12:03 AM
     */

    namespace ShawnSandy\GitContent\Classes;


    /**
     * Class Repo
     * @package ShawnSandy\GitContent\Classes
     */
    class Repo extends GitClient
    {

        protected $repo;

        /**
         * Repo constructor.
         */
        public function __construct()
        {
            parent::__construct();

            $this->repo = $this->client->api('repo');

        }

        /**
         * @param $name
         * @param null $array
         */
        public function find($name, $array = NULL)
        {

            $this->repo->find($name, $array);

        }

        /**
         * @param $owner
         * @param $repository
         * @return mixed
         */
        public function show($owner, $repository)
        {
            return $this->repo->show($owner, $repository);
        }

        /**
         * @param $owner
         * @param $repository
         * @return mixed
         */
        public function collaborator($owner, $repository)
        {
            return $this->repo->collaborator($owner, $repository);
        }

    }
