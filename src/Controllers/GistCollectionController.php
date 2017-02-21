<?php

    namespace ShawnSandy\GitContent\Controllers;

    use App;
    use Exception;
    use Log;
    use Session;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use ShawnSandy\GitContent\GistCollection;


    class GistCollectionController extends Controller
    {

        protected $gist;

        /**
         * GistCollectionController constructor.
         */
        public function __construct()
        {
            $this->gist = App::make('ShawnSandy\GitContent\Classes\Gist');
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $data = GistCollection::orderBy('id', 'desc')->paginate("20");

            return view('gitcontent::gcollections.index', compact('data'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('gitcontent::gcollections.create');
        }


        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $data = GistCollection::find($id);

            return view("gitcontent::gcollections.show", compact('data'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $data = GistCollection::find($id);

            return view("gitcontent::gcollections.edit", compact('data'));

        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {


            $data = $request->all();

            $data['gist_id'] = last(explode('/', $data['gist_id']));

            try {

                GistCollection::updateOrCreate(['id' => $id], $data);
                Session::flash("success", "Your collection has been updated");

            } catch (Exception $exception) {

                Log::error($exception->getMessage());
                Session::flash("error", "Sorry, we failed to update your collection");

            }

            return back();

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }

    }
