<?php
    namespace ShawnSandy\GitContent\Controllers;

    use Log;
    use Cache;
    use Exception;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use ShawnSandy\GitContent\Classes\Gist;

    class GistController extends Controller
    {
        protected $gist;

        protected $cacheId = 'git-cache';

        /**
         * Gist constructor.
         */
        public function __construct()
        {
            $this->gist = new Gist();
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
            $gist = $this->gist->formatData($results);

            return view('gitcontent::show', compact('gist'));

        }

        /**
         * @param Request $request
         * @return array
         */
        public function store(Request $request)
        {
            $this->validate($request, [
                'filename' => 'required',
                'description' => 'required',
                'access' => 'required',
                'content' => 'required'
            ]);

            try {
                $this->gist->create($request->all());

            } catch (Exception $e) {
                Log::error("Error saving new gist data : {$e->getMessage()}");
            }

            Cache::forget($this->cacheId);

            return redirect('/gist');

        }

        /**
         * @param Request $request
         * @param $gistId
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function update(Request $request, $gistId)
        {
            $this->validate($request, [
                'filename' => 'required',
                'description' => 'required',
                'access' => 'required',
                'content' => 'required'
            ]);

            try {
                $this->gist->update($gistId, $request->all());
            } catch (Exception $e) {
                Log::error("Error saving new gist data : {$e->getMessage()}");
            }

            return redirect('/show/' . $gistId);

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

    }
