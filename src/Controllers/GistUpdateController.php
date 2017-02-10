<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 2/10/17
 * Time: 10:56 AM
 */

namespace ShawnSandy\GitContent\Controllers;


use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use ShawnSandy\GitContent\Classes\Gist;

class GistUpdateController extends Controller
{


    public function __invoke($gistid, Request $request, Gist $gist)
    {

        if (!$request->has('deletefile'))
            return back()->with('error', "Hrmmm, I cannot process this request, please try again");

            $data = $gist->formatFileDelete($request->deletefile);

            try {
                $gist->update($gistid, $data);
                $gist->forgetItem($gistid);
            } catch (Exception $exception) {
                Log::error('Failed to update file' . $exception->getMessage());
                return back()->with('error', $exception->getMessage());
            }

        return back()->with('success', 'Your file was delete... ');

    }

}
