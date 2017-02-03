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
        $this->apiMethod = 'gist';
        $this->gist = $this->api();

    }

    /**
     * @return mixed
     */
    public function all()
    {
        $data = $this->api()->all();

        $formatted = collect($data)->map(function($results) {
            return $this->formatData($results);
        });

        return $formatted;
    }

    /**
     *
     * @param array $parameters
     * @return mixed
     */
    public function paginateAll($parameters = [])
    {
        return $this->paginate('all', $parameters);
    }

    /**
     * @param null $id
     * @return array|bool|\Illuminate\Support\Collection
     */
    public function get($id = NULL)
    {

        if (is_null($id)) return FALSE;

        $results = $this->gist->show($id);

        return $this->formatData($results);

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
     * @param $gistId
     * @param array $data
     * @return bool
     */
    public function update($gistId, $data = [])
    {
        if (empty($data)) return FALSE;

        return $this->api()->update($gistId, $data);
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
