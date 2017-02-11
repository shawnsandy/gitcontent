<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/5/2017
     * Time: 12:53 PM
     */

    namespace ShawnSandy\GitContent\Classes;

    class GistRequest extends GCClient
    {

        use ContentTrait ;

        public function __construct()
        {
            parent::__construct();
        }

        /**
         * @param $username
         * @param int $resultsPerPage
         * @param null $page
         * @return array|static
         */
        public function userGists($username, $resultsPerPage = null, $page = null)
        {

            $this->setApiMethod('users/' . $username . '/gists')
                ->setQuery(['page' => $page, 'per_page' => $resultsPerPage]);

            return $this->results();

        }


        /**
         * @param $token
         * @param $authKey
         * @return $this
         */
        public function authenticate($token, $authKey)
        {

            $this->setAuthType($token)
                ->setAuthKey($authKey)
                ->setAuth();

            return $this;

        }

        /**
         * @return static
         */
        public function results()
        {

            $resp = $this->getRequest();
            $data = collect(json_decode($resp->getBody(), TRUE))->map(function ($items) {
                return $this->formatData($items);
            });

            return $data;

        }



    }
