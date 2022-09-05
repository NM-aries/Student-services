<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $search = $request->input('search');

        $announcement = Announcement::query()
                        ->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->Paginate(5);
        $news         = News::query()
                        ->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->Paginate(5);
        
    
        return view('search_result',compact('news','announcement'));
    }
}
