<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/11/2017
     * Time: 2:16 PM
     */

    namespace ShawnSandy\GitContent\Collections ;



    use App\GistCollection;
    use ShawnSandy\GitContent\Classes\GitClient;

    class GitCollections extends GitClient
    {

        public $collection;

        public function __construct()
        {
            parent::__construct();
            $this->apiMethod = "gist";
            $this->collection = $this->api();
        }


        /*
         * List all/users collection
         * */
        public function collections(){

            return GistCollection::all();

        }


        /**
         * Creates a new collection of gist files
         * create a description / readme.md
         * fields (description,filename (readme.md)/public,code/content)
         * post to user gist.github.com
         * save post gistid and summary to collection table
         * */
        public function newCollection(){

        }

        /**
         * Create a collection from existing gist url or id
         * submit an existing gist url or id on submit get the ID
         * if gist url parse get ID / if gistId continue
         * search find the gist on github by ID
         * Add gist to collection table
         * */
        public function importCollection() {

        }


    }
