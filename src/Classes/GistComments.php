<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/2/2017
     * Time: 7:24 PM
     */

    namespace ShawnSandy\GitContent\Classes;


    use Carbon\Carbon;

    class GistComments extends GitClient
    {

        protected $comments;

        public function __construct()
        {
            parent::__construct();
            $this->apiMethod = 'gist';
            $this->comments = $this->api()->comments();
        }

        public function all($gistId)
        {

            return $this->comments->all($gistId);

        }

        public function create($gistId, $comment)
        {
            return $this->comments->create($gistId, $comment);
        }

        public function update($gisId, $commentId, $comment)
        {
            return $this->comments->update($gisId, $commentId, $comment);
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

        public function delete($gistID, $commentId){
            return $this->comments->delete($gistID, $commentId);
        }

    }
