<?php
namespace ShawnSandy\GitContent\Controllers;

use Log;
use Cache;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ShawnSandy\GitContent\Classes\Gist;
use ShawnSandy\GitContent\Classes\GistComments;
use ShawnSandy\GitContent\Classes\GistRequest;

class GistController extends Controller
{
    protected $gist;
    protected $client;
    protected $cacheId = 'git-cache';
    protected $cacheTime = 60;

    protected $comments;

    /**
     * Gist constructor.
     */
    public function __construct(GistRequest $gist)
    {
        $this->client = $gist;
        $this->gist = new Gist();
        $this->comments = new GistComments();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param null $page
     * @internal param Request $request
     */
    public function index()
    {
        $resultsPerPage = 10;

        $cacheId = $this->cacheId;
        if(request()->has('page'))
            $cacheId = $cacheId.'-'.request()->get('page');

        if (Cache::has($cacheId)):
            $data = Cache::get($cacheId);
        else :
            $data = $this->client->authenticate('token', 'cfb8f16f8bcf0a4f3039d4e94fc9e56ca80caaa4')
                ->userGists('shawnsandy', $resultsPerPage, request('page'));
            Cache::add($this->cacheId, $data, $this->cacheTime);
            Log::info("Cache set");
        endif;
        $pagination = $this->client->paginate($data, $resultsPerPage);

        return view('gitcontent::index', compact('data', 'pagination'));

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

        $gist = $this->gist->get($gistId);

        $comments = $this->comments->all($gistId);

        return view('gitcontent::show', compact('gist', 'comments', 'gistId'));

    }


    public function edit($gistId){

        $data = $this->gist->get($gistId);

        return view('gitcontent::edit', compact('gistId', 'data'));

    }

    /**
     * @param Request $request
     * @return array|bool
     */
    public function store(Request $request)
    {

        if ($saved = $this->save($request))
            $request->session()->flash('success', 'Your gist has been saved');

        return redirect('/gist/' . $saved['id']);

    }

    /**
     * @param Request $request
     * @param $gistId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $gistId)
    {
        if ($saved = $this->save($request, $gistId))
            $request->session()->flash('success', 'Your gist has been saved');

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

        $this->gist->forgetItem($gistId);
        redirect('/gist');

    }

    /**
     * @param Request $request
     * @param null $gistId
     * @return bool
     */
    private function save(Request $request, $gistId = NULL)
    {
        $this->validate($request, [
            'filename' => 'required',
            'description' => 'required',
            'access' => 'required',
            'content' => 'required'
        ]);

        try {
            if (is_null($gistId)):
                $saved = $this->gist->create($request->all());
            else :
                $saved = $this->gist->update($gistId, $request->all());
                $this->gist->cacheItem($saved, $gistId);
            endif;
            $this->gist->forgetCollection();

        } catch (Exception $e) {
            Log::error("Error saving new gist data : {$e->getMessage()}");
        }

        return $saved;
    }



}
