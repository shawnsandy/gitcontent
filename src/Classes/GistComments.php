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
            $results = $this->comments->all($gistId);

            $formatted = collect($results)->map(function($items) {
                return $this->formatComment($items);
            });

            return $formatted ;

        }

        public function create($gistId, $comment)
        {
            return $this->comments->create($gistId, $comment);
        }

        public function update($gisId, $commentId, $comment)
        {
            return $this->comments->update($gisId, $commentId, $comment);
        }

        public function delete($gistID, $commentId){
            return $this->comments->delete($gistID, $commentId);
        }

    }
