<?php

namespace ShawnSandy\GitContent\Classes;

use Github\Client;
use Github\ResultPager;


class GitClient
{

    protected $client;
    protected $paginate;
    protected $next;
    protected $previous;
    protected $api = 'gist';

    public function __construct()
    {

        $this->client = new Client();
        $this->paginate = new ResultPager($this->client);
        $this->client->authenticate('cfb8f16f8bcf0a4f3039d4e94fc9e56ca80caaa4', NULL, Client::AUTH_HTTP_TOKEN);

    }

    public function api()
    {
        return $this->client->api($this->api);
    }

    public function paginate($method, $parameters = [])
    {
        $api = $this->api($this->api);
        $data = $this->paginate->fetch($api, $method, $parameters);
        $this->next = ($this->paginate->hasNext()) ? $this->paginate->fetchNext() : false;
        $this->previous = ($this->paginate->hasPrevious()) ? $this->paginate->fetchPrevious() : false;
        return $data;
    }

    public function nextPage()
    {
        return $this->next;
    }

    public function previousPage(){
        return $this->previous ;
    }

}
