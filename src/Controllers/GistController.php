<?php
    namespace ShawnSandy\GitContent\Controllers;

    use Log;
    use Exception;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use ShawnSandy\GitContent\Classes\Gist;
    use ShawnSandy\GitContent\Classes\GistComments;

    class GistController extends Controller
    {
        protected $gist;

        protected $comments;

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

            $data = $this->gist->all();

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

            $gist = $this->gist->get($gistId);

            $comments = $this->comments->all($gistId);

            return view('gitcontent::show', compact('gist', 'comments'));

        }

        /**
         * @param Request $request
         * @return array|bool
         */
        public function store(Request $request)
        {
            if($saved = $this->save($request))
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
            if($saved = $this->save($request, $gistId))
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
