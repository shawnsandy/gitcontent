<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 2/21/17
 * Time: 10:36 AM
 */

namespace ShawnSandy\GitContent\Controllers;

use Exception;
use Session;
use Illuminate\Http\Request;
use ShawnSandy\GitContent\GistCollection;

class GistStoreCollectionController extends GistCollectionController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request|Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $data = $request->all();

        $data['gist_id'] = last(explode('/', $data['gist_id']));

        try {

            $this->gist->get($data['gist_id']);

        } catch (Exception $exception) {
            $addToGithub = [
                'filename' => 'README.md',
                'content' => "# {$data['title']}",
                'public' => TRUE,
                'description' => $data['title']
            ];

        }

        if (isset($addToGithub)) {

            try {

                $gist = $this->gist->create($addToGithub);

                $data['gist_id'] = $gist['id'];

            } catch (Exception $exception) {

                Session::flash('error', 'Failed to create a new gist, please verify your Github info');

            }

        }

        if (GistCollection::create($data)) {

            Session::flash('success', "Your collection has been saved");

        } else {

            Session::flash('error', 'Failed to save your collection');

        }

        return redirect('/collections');

    }

}
