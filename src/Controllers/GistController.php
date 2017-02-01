<?php
    namespace ShawnSandy\GitContent\Controllers;


    use Cache;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use ShawnSandy\GitContent\Classes\Gist;

    class GistController extends Controller
    {
        protected $gist;

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

            if (Cache::has('gistContent')):
                $data = Cache::get('gistContent');
            else :
                $data = $this->gist->all();
                Cache::add('gistContent', $data, 600);
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

        public function store(Request $request)
        {
            $this->validate($request, [
                'filename' => 'required',
                'description' => 'required',
                'access' => 'required',
                'content' => 'required'
            ]);
//
//            return back()->withInput();

        }

        public function update(Request $request, $gistId)
        {

        }


    }
