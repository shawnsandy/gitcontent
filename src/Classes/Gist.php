<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 1/22/2017
     * Time: 8:41 PM
     */

    namespace ShawnSandy\GitContent\Classes;


    class Gist extends GitClient
    {

        protected $gist;

        public function __construct()
        {
            parent::__construct();

            $this->gist = $this->client->api('gist');
        }

        /**
         * @return mixed
         */
        public function all()
        {
            return $this->gist->all();
        }

        /**
         * @param null $id
         * @return bool
         */
        public function get($id = NULL)
        {
            if (is_null($id)) return FALSE;

            return $this->gist->show($id);

        }

        /**
         * @param null $id
         * @return bool
         */
        public function commits($id = NULL)
        {
            if (is_null($id)) return FALSE;

            return $this->gist->commits();
        }

        /**
         * @param array $data
         * @return bool
         */
        public function create($data = [])
        {
            if (empty($data)) return FALSE;

            return $this->gist->create($data);
        }

        /**
         * @param array $data
         * @return bool
         */
        public function update($data = [])
        {
            if (empty($data)) return FALSE;

            return $this->gist->update($data);
        }

        public function delete($id = NULL)
        {
            if (is_null($id)) return FALSE;

            return $this->gist->delete($id);
        }


    }
