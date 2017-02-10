<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/5/2017
     * Time: 10:59 PM
     */

    namespace ShawnSandy\GitContent\Classes;


    use Carbon\Carbon;

    trait ContentTrait
    {

        protected $cacheId = 'git-cache';
        protected $cacheTime = 60;

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

            return $comments;

        }


        public function formatData($data = [])
        {
            $dataArray = [
                'ownerLogin' => $data['owner']['login'],
                'ownerId' => $data['owner']['id'],
                'ownerAvatar' => $data['owner']['avatar_url'],
                'ownerUrl' => $data['owner']['html_url'],
                'gistUrl' => $data['html_url'],
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
                'forks' => (isset($data['forks'])) ? $data['forks'] : NULL,
                'history' => (isset($data['history'])) ? $data['history'] : NULL,
            ];

            return $dataArray;

        }

        /**
         * @param $data
         * @param $resultsPerPage
         * @return array
         */
        public function paginate($data, $resultsPerPage)
        {
            $page = 1;

            if (request()->has('page')):
                $page = request()->get('page');
            endif;

            $pagination = [

                'currentPage' => $page,
                'nextPage' => $page + 1,
                'previousPage' => $page - 1,
                'lastPage' => (count($data) < $resultsPerPage) ? TRUE : FALSE

            ];

            return $pagination;
        }

        public function formatUpdates($data = []) {

            $update =   [
                'files' => [
                    $data['files'] => [
                        'content' => isset($data['content']) ? $data['content'] : "// add code here"
                    ]
                ]
            ];

            return $update;
        }

        public function formatFileDelete($data = null) {

            $delete = [
                'files' => [
                    $data => null
                ]
            ];

            return $delete ;

        }

    }
