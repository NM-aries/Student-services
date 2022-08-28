<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $query = $request->input('search');

        $announcement = Announcement::where('status', '1')->search($query)->get();
        $news         = News::where('status', '1')->search($query)->get();
        
        
        // $result = $announcement->concat($news)->shuffle()->take(4);

        return view('search_result',compact('news','announcement'));
    }
}
