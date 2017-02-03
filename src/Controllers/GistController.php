<?php
namespace ShawnSandy\GitContent\Controllers;

use Log;
use Cache;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ShawnSandy\GitContent\Classes\Gist;
use ShawnSandy\GitContent\Classes\GistComments;

class GistController extends Controller
{
    protected $gist;

    protected $comments;

    protected $cacheId = 'git-cache';

    /**
     * Gist constructor.
     */
    public function __construct()
    {
        $this->gist = new Gist();
        $this->comments = new GistComments();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if (Cache::has($this->cacheId)):
            $data = Cache::get($this->cacheId);
        else :
            $data = $this->gist->all();
            Cache::add($this->cacheId, $data, 600);
        endif;

        return view('gitcontent::index', compact('data'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('gitcontent::create');
    }

    /**
     * @param $gistId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($gistId)
    {


        $key = $this->cacheId . '-' . $gistId;

        if (Cache::has($key)):
            $results = Cache::get($key);
        else :
            $results = $this->gist->get($gistId);
            Cache::add($key, $results, 600);
        endif;
        $gist = $results ;

        $comments = $this->comments->all($gistId);
        dump($comments);

        return view('gitcontent::show', compact('gist', 'comments'));

    }

    /**
     * @param Request $request
     * @return array|bool
     */
    public function store(Request $request)
    {
        $saved = $this->save($request);
        return redirect('/gist/' . $saved['id']);

    }

    /**
     * @param Request $request
     * @param $gistId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $gistId)
    {
        $saved = $this->save($request, $gistId);
        return redirect('/gist/' . $saved['id']);

    }

    /**
     * Delete gist
     * @param $gistId
     */
    public function delete($gistId)
    {

        try {
            $this->gist->delete($gistId);
        } catch (Exception $e) {
            Log::error("Error saving deleting data : {$e->getMessage()}");
        }

        Cache::forget($this->cacheId);
        redirect('/gist');

    }

    /**
     * @param Request $request
     * @param null $gistId
     * @return bool
     */
    private function save(Request $request, $gistId = null)
    {
        $this->validate($request, [
            'filename' => 'required',
            'description' => 'required',
            'access' => 'required',
            'content' => 'required'
        ]);

        try {
            if(is_null($gistId)):
            $saved = $this->gist->create($request->all());
            else :
            $saved = $this->gist->update($gistId, $request->all());
            endif;

        } catch (Exception $e) {
            Log::error("Error saving new gist data : {$e->getMessage()}");
        }

        Cache::forget($this->cacheId);

        return $saved;
    }

}
