<?php

namespace ShawnSandy\GitContent\Classes;

use Carbon\Carbon;
use Github\Client;
use Github\ResultPager;

class GitClient
{

    protected $client;
    protected $paginate;
    protected $next;
    protected $previous;
    protected $apiMethod = 'gist';

    public function __construct()
    {

        $this->client = new Client();
        $this->paginate = new ResultPager($this->client);
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


    public function formatData($data = [])
    {

        $dataArray = [
            'ownerLogin' => $data['owner']['login'],
            'ownerId' => $data['owner']['id'],
            'ownerAvatar' => $data['owner']['avatar_url'],
            'ownerUrl' => $data['owner']['html_url'],
            'gistUrl' => $data['owner']['html_url'],
            'id' => $data['id'],
            'description' => $data['description'],
            'public' => $data['public'],
            'files' => $data['files'],
            'comments' => $data['comments'],
            'commentsUrl' => $data['comments_url'],
            'created_at' => $data['created_at'],
            'created' => Carbon::parse($data['created_at'])->diffForHumans(),
            'updated_at' => $data['updated_at'],
            'updated' => Carbon::parse($data['updated_at'])->diffForHumans(),
            'forks' => (isset($data['forks'])) ? $data['forks'] : null,
            'history' => (isset($data['history'])) ? $data['history'] :  null ,
        ];

        return $dataArray;

    }


    public function formatComment($comment = [])
    {
        $comments = [
            'id' => $comment['id'],
            'created_at' => $comment['created_at'],
            'created' => Carbon::parse($comment['created_at'])->diffForHumans(),
            'updated_at' => $comment['updated_at'],
            'updated' => Carbon::parse($comment['created_at'])->diffForHumans(),
            'body' => $comment['body'],
            'userLogin' => $comment['user']['login'],
            'userId' => $comment['user']['id'],
            'userAvatar' => $comment['user']['avatar_url'],
            'userUrl' => $comment['user']['html_url'],
        ];

        return $comments ;

    }



}
