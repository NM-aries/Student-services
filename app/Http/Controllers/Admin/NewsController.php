<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logs;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\NewsFormRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at' ,'desc')->with(['user'])->get();
        return view ('admin._news.index', compact('news'));
    }

    public function create()
    {
        return view('admin._news.create');
    }

    public function store(NewsFormRequest $request)
    {
        $data = $request->validated();
        
        $this->validate($request,[
            'slug'=>'alpha_dash|required|unique:announcement'
        ]);
        

        $news = new News();
        $news->title = $data['title'];
        $news->status = $data['status'];
        $news->slug = Str::slug($data['slug']);
        $news->description = $data['description'];
        $news->visit_count = 0;

        if($request->hasfile('coverimage')){
            $file = $request->file('coverimage');
            $filename = Str::slug($data['slug']) . '.' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/news/', $filename);
            $news->coverimage = $filename;
        }
        $news->created_by = Auth::user()->id;
        $news->save();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-success"> Created </span> ';
        $logs->action = '<a class="text-success"> News </a> :'. $news->title;
        $logs->save();
        
        session()->flash('message', 'News <span class="text-success fw-bolder text-decoration-underline">'. $news->title. '</span> Created');
        return redirect('admin/news');
    }

    public function edit($news_id)
    {
        $news = News::find($news_id);
        return view('admin._news.edit' , compact('news'));
    }


    public function update(NewsFormRequest $request, $news_id)
    {
        $data = $request->validated();

        $news = News::find($news_id);
        $news->title = $data['title'];
        $news->status = $data['status'];
        $news->slug = Str::slug($data['slug']);
        $news->description = $data['description'];
        $news->created_by = $request->input('created_by');
        $news->updated_by = Auth::user()->name;

        if($request->hasfile('coverimage')){
            $file = $request->file('coverimage');
            $filename = Str::slug($data['slug']) . '.' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/news/', $filename);
            $news->coverimage = $filename;
        }
       
        $news->update();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-info"> Updated </span> ';
        $logs->action = '<a class="text-info"> News </a> : '. $news->title;
        $logs->save();

        session()->flash('message', 'News <span class="text-success fw-bolder text-decoration-underline">'. $news->title. '</span> Updated ');
        return redirect('admin/news');
    }

    public function show($news_id)
    {
        $news = News::find($news_id);
        return view ('admin._news.show', compact('news'));
    }


    public function destroy($news_id)
    {
        $news = News::find($news_id);

        if(!$news->coverimage)
        {
            $news->delete();
        }else{
            unlink("upload/news/".$news->coverimage);
            $news->delete();
        }        
        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-danger"> Removed </span> ';
        $logs->action = '<a class="text-danger"> News </a> : '. $news->title;
        $logs->save();
        
        session()->flash('message', 'News <span class="text-success fw-bolder text-decoration-underline">'. $news->title. '</span> Deleted');
        return redirect('admin/news');
    }



    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    
}
