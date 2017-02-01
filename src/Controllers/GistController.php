<?php
    namespace ShawnSandy\GitContent\Controllers;


    use Cache;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Log;
    use ShawnSandy\GitContent\Classes\Gist;

    class GistController extends Controller
    {
        protected $gist;

        protected $gitCache = 'git-cache';

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

            if (Cache::has($this->gitCache)):
                $data = Cache::get($this->gitCache);
            else :
                $data = $this->gist->all();
                Cache::add($this->gitCache, $data, 600);
            endif;

            return view('gitcontent::index', compact('data'));

        }

        public function show($gistId)
        {
            $data = $this->gist->get($gistId);
            return view('gitcontent::show', compact('data')) ;
        }

        public function create()
        {
            return view('gitcontent::create');
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

            } catch (\Exception $e) {
                Log::error("Error saving new gist data");
            }
            Cache::forget($this->gitCache);
            return redirect('/gist');

        }

        public function update(Request $request, $gistId)
        {

        }


    }
