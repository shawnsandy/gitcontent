<?php

    namespace ShawnSandy\GitContent\Classes;

    use Github\Client;


    class GitClient
    {

        protected $client;

        public function __construct()
        {
            $this->client = new Client();
            $this->client->authenticate('cfb8f16f8bcf0a4f3039d4e94fc9e56ca80caaa4', NULL, Client::AUTH_HTTP_TOKEN);
        }

        public function gist()
        {
            return $this->client->api('gist');
        }

    }
