<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 1/25/2017
     * Time: 7:09 PM
     */

    namespace ShawnSandy\GitContent\Classes;


    /**
     * Class Comments
     * @package ShawnSandy\GitContent\Classes
     */
    class Comments extends GitClient
    {
        /**
         * @var
         */
        protected $comments;

        /**
         * Comments constructor.
         */
        public function __construct()
        {
            parent::__construct();

            $this->comments = $this->client->api('gist')->comments();
        }

        /**
         * @param bool $gistID
         * @return bool
         */
        public function listComments($gistID = FALSE)
        {
            if (!$gistID) return FALSE;

            return $this->comments->all($gistID);
        }

        /**
         * @param bool $gistID
         * @param bool $commentID
         * @return bool
         */
        public function showComment($gistID = FALSE, $commentID = FALSE)
        {
            if (!$gistID && !$commentID) return FALSE;

            return $this->comments->show($gistID, $commentID);
        }

        /**
         * @param null $comment
         * @param null $gistID
         * @param null $commentID
         * @return bool
         */
        public function createUpdate($comment = NULL, $gistID = NULL, $commentID = NULL)
        {

            if (!is_null($gistID) && is_null($commentID)) return FALSE;

            return $this->comments->create($gistID, $commentID, $comment);

        }


    }
