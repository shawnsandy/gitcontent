<?php

namespace ShawnSandy\GitContent\Classes;

use App;
use Cache;
use Carbon\Carbon;
use Github\Client;
use Github\ResultPager;
use Log;

class GitClient
{
    use ContentTrait ;

    protected $client;
    protected $paginate;
    protected $next;
    protected $previous;
    protected $apiMethod = 'gist';
//    protected $cacheId = 'git-cache';
//    protected $cacheTime = 60;

    public function __construct()
    {

        /* TODO Bind Client to service provider */
        $this->client = App::make('Github\Client');
        $this->paginate = App::make('Github\ResultPager', [$this->client]);
        $this->client->authenticate('cfb8f16f8bcf0a4f3039d4e94fc9e56ca80caaa4', NULL, Client::AUTH_HTTP_TOKEN);

    }

    public function api()
    {
        return $this->client->api($this->apiMethod);
    }

    public function paginate($method, $parameters = [])
    {
        $api = $this->api($this->apiMethod);
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


    public function forgetCollection() {
        Cache::forget($this->cacheId);
        Log::info('Cache cleared');
    }

    public function forgetItem($id) {
        Cache::forget($this->cacheId.'-'.$id);
        Log::info('Cache cleared item '.$id);
    }

    public function cacheCollection($data) {
        Cache::add($this->cacheId, $data, $this->cacheTime);
        Log::info('Collection added or updated');
    }

    public function cacheItem($data, $id) {
        Cache::add($this->cacheId.'-'.$id, $data, $this->cacheTime);
        Log::info('Collection added or updated item '.$id);
    }

}
