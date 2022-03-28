<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

/**
 * The HelperController is used
 * for serving ajax requests to javascript
 * around the site
 */
class HelperController extends Controller
{
    /**
     * Used for adding tags to a project in the "Edit"
     * project window
     */
    public function tagSearch(Request $request){
        //Get search term
        $term = $request->input('text');
        //Search the keywords table
        $keywords = DB::table('tags')->where('name', 'Like', '%' . $term . '%')->get();
        //Return the results
        return response()->json($keywords);
    }

}
