<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 2/12/2017
     * Time: 2:56 PM
     */

    namespace ShawnSandy\GitContent\Collections;


    use App\GistCollection;
    use App\Http\Controllers\Controller;
    use Crew\Unsplash\Exception;
    use Illuminate\Http\Request;
    use Log;
    use Session;

    class CollectionController extends Controller
    {

        public function __construct()
        {
        }

        public function index()
        {
            $data = GistCollection::all();

            return view('gitcontent::gcollections.index', compact('data'));
        }

        public function show()
        {

        }

        public function create()
        {
            return view('gitcontent::gcollections.create');
        }

        public function edit()
        {


        }

        public function store(Request $request)
        {
            $data = $request->all();
            $data['gist_id'] = last(explode('/', $data['gist_id']));

            try {
                GistCollection::create($data);
                Session::flash('success', "Your collection has been saved");
            } catch (Exception $exception) {
                Log::error('Error saving collection ' . $exception->getMessage());
                Session::flash('error', $exception->getMessage());
                back()->withInput();
            }

            return back();
        }

        public function update($collectionId, Request $request)
        {

            $data = $request->all();
            $data['gist_id'] = last(explode('/', $data['gist_id']));

            //$collection = GistCollection::find($gitstId);

            try {
                GistCollection::updateOrCreate(['id' => $collectionId], $data );
            } catch (Exception $exception) {
                Log::error($exception->getMessage());
            }

        }

    }
