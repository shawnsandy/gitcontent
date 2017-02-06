<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/5/2017
     * Time: 2:04 AM
     */

    namespace ShawnSandy\GitContent\Classes;

    use App;
    use Carbon\Carbon;


    class GCClient
    {

        /**
         * @var \GuzzleHttp\Client|mixed
         */
        protected $client;
        /**
         * @var
         */
        protected $request;
        /**
         * @var string
         */
        protected $base_uri = 'https://api.github.com/';
        /**
         * @var string
         */
        protected $apiMethod = 'users/shawnsandy/gists';
        /**
         * @var null
         */
        protected $query = NULL;
        /**
         * @var null
         */
        protected $auth_type = NULL;
        /**
         * @var null
         */
        protected $auth_key = NULL;
        /**
         * @var null
         */
        protected $auth = NULL;

        protected $response;

        public function __construct()
        {
            /* TODO Bind class in the service provider*/
            $this->client = App::make('GuzzleHttp\Client');

        }


        public function getRequest()
        {

            return $this->request = $this->client->request('GET', $this->base_uri . $this->apiMethod, [
                'query' => $this->query,
                'auth' => $this->auth,
            ]);

        }

        /**
         * @param \GuzzleHttp\Client|mixed $client
         * @return GCClient
         */
        public function setClient($client)
        {
            $this->client = $client;

            return $this;
        }

        /**
         * @param mixed $request
         * @return GCClient
         */
        public function setRequest($request)
        {
            $this->request = $request;

            return $this;
        }

        /**
         * @param string $base_uri
         * @return GCClient
         */
        public function setBaseUri($base_uri)
        {
            $this->base_uri = $base_uri;

            return $this;
        }

        /**
         * @param string $apiMethod
         * @return GCClient
         */
        public function setApiMethod($apiMethod)
        {
            $this->apiMethod = $apiMethod;

            return $this;
        }

        /**
         * @param array $query
         * @return GCClient
         */
        public function setQuery($query)
        {
            $this->query = $query;

            return $this;
        }

        /**
         * @param string $auth_type
         * @return GCClient
         */
        public function setAuthType($auth_type)
        {
            $this->auth_type = $auth_type;

            return $this;
        }

        /**
         * @param string $auth_key
         * @return GCClient
         */
        public function setAuthKey($auth_key)
        {
            $this->auth_key = $auth_key;

            return $this;
        }

        public function setAuth()
        {
            $this->auth = [$this->auth_type, $this->auth_key];

            return $this;
        }


    }
