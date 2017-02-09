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
        if (request()->has('page'))
            $cacheId = $cacheId . '-' . request()->get('page');

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


    public function edit($gistId)
    {

        $data = $this->gist->get($gistId);

        return view('gitcontent::edit', compact('gistId', 'data'));

    }

    /**
     * @param Request $request
     * @return array|bool
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'description' => 'sometimes|required',
            'public' => 'sometimes|required',
            'content' => 'sometimes|required'
        ]);

        $data = $request->all();

        if ($saved = $this->save($data)):
            $request->session()->flash('success', 'Your gist has been saved');
        else :
            back()->with('error', 'failed to save');
        endif;

        return redirect('/gist/' . $saved['id']);

    }

    /**
     * @param Request $request
     * @param $gistId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $gistId)
    {
        // dd($request->all());
        $this->validate($request, [
            'files' => 'sometimes|required',
            'description' => 'sometimes|required',
            'public' => 'sometimes|required',
            'content' => 'sometimes|required',
        ]);


        $data = $request->all();
        dump($data);
        if ($request->exists('new-file')):
            // parse a create am array to handle new file
            $data = [
                'files' => [
                    $data['files'] => [
                        'content' => isset($data['content']) ? $data['content'] : "// add you code here"
                    ]
                ]
                ];
            dd($data);
        endif ;

        if ($saved = $this->save($data, $gistId)) :
            $request->session()->flash('success', 'Your gist has been saved');
        else :
            $request->session()->flash('error', 'Sorry an error occurred while saving your gist');
        endif;

        return redirect('/gist/' . $saved['id'] . '/edit');

    }

    /**
     * Delete gist
     * @param $gistId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($gistId)
    {

        try {
            $this->gist->delete($gistId);
        } catch (Exception $e) {
            $msg = "Error deleting data : {$e->getMessage()}";
            Log::error($msg);
            return back()->with('error', $msg);
        }

        $this->gist->forgetItem($gistId);
        return redirect('/gist')->with('success', 'YOur gist has been deleted');

    }

    /**
     * @param array $data
     * @param null $gistId
     * @return bool
     * @internal param Request $request
     */
    private function save($data = [], $gistId = NULL)
    {


        try {
            if (is_null($gistId)):
                $saved = $this->gist->create($data);
            else :
                $saved = $this->gist->update($gistId, $data);
                $this->gist->forgetItem($gistId);
                $this->gist->cacheItem($saved, $gistId);
            endif;

            $this->gist->forgetCollection();

        } catch (Exception $e) {
            Log::error("Error saving new gist data : {$e->getMessage()}");
            return back()->with('error', $e->getMessage());
        }

        return $saved;
    }

    public function forms(Request $request)
    {
        return $request->all();

    }


}
