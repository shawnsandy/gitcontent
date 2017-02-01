<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 1/22/2017
 * Time: 8:41 PM
 */

namespace ShawnSandy\GitContent\Classes;


use Github\ResultPager;

class Gist extends GitClient
{

    protected $gist;

    public function __construct()
    {
        parent::__construct();
        $this->api = 'gist';
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->api()->all();
    }

    public function paginateAll($parameters = [])
    {
        return $this->paginate('all', $parameters);
    }

    /**
     * @param null $id
     * @return bool
     */
    public function get($id = NULL)
    {

        if (is_null($id)) return FALSE;

        return $this->api()->show($id);

    }

    /**
     * @param null $id
     * @return bool
     */
    public function commits($id = NULL)
    {
        if (is_null($id)) return FALSE;

        return $this->api()->commits();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create($data = [])
    {
        if (empty($data)) return FALSE;

        $content = [
            'files' => [
                $data['filename'] => [
                    'content' => $data['content']
                ]
            ],
            'public' => $data['access'],
            'description' => $data['description']
        ];

        return $this->api()->create($content);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update($data = [])
    {
        if (empty($data)) return FALSE;

        return $this->api()->update($data);
    }


    /**
     * @param null $id
     * @return bool
     */
    public function delete($id = NULL)
    {
        if (is_null($id)) return FALSE;

        return $this->api()->delete($id);
    }


}
