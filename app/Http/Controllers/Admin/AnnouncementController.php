<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Models\Announcement;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AnnouncementFormRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Facade\FlareClient\Stacktrace\File;
use App\Models\Logs;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at','desc')->get();
        return view ('admin._announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view ('admin._announcement.create');
    }

    public function store(AnnouncementFormRequest $request)
    {
        $data = $request->validated();
        
        $this->validate($request,[
            'slug'=>'alpha_dash|required|unique:announcement'
        ]);
        
        $announcement = new Announcement();
        $announcement->title = $data['title'];
        $announcement->status = $data['status'];
        $announcement->slug = Str::slug($data['slug']);
        $announcement->description = $data['description'];
        $announcement->visit_count = 0;

        if($request->hasfile('coverimage')){
            $file = $request->file('coverimage');
            $filename = $data['slug'] . '.' . $file->getClientOriginalExtension();
            $file->move('upload/announcement/', $filename);
            $announcement->coverimage = $filename;
        }
        $announcement->created_by = Auth::user()->id;
        $announcement->save();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-success"> Created </span> ';
        $logs->action = '<a class="text-success">Announcement</a> : '. $announcement->title;
        $logs->save();
        
        session()->flash('message', '<i>Announcement</i> Created Successfully');
        return redirect('admin/announcement');
    }

    public function edit($announcement_id)
    {
        $announcement = Announcement::find($announcement_id);
        return view ('admin._announcement.edit', compact('announcement'));
    }

    public function update(AnnouncementFormRequest $request, $announcement_id)
    {
        $data = $request->validated();
        $announcement = Announcement::find($announcement_id);
        $announcement->title = $data['title'];
        $announcement->status = $data['status'];
        $announcement->slug = Str::slug($data['slug']);
        $announcement->description = $data['description'];

        if($request->hasfile('coverimage')){
            $file = $request->file('coverimage');
            $filename = $data['slug'] . '.' . $file->getClientOriginalExtension();
            if(file_exists($announcement->coverimage)){
                unlink("upload/announcement/".$announcement->coverimage);
            }
            $file->move('upload/announcement/', $filename);
            $announcement->coverimage = $filename;
        }

        
        $announcement->created_by = $request->input('created_by');
        $announcement->updated_by = Auth::user()->name;
        $announcement->update();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-info"> Updated </span>';
        $logs->action = '<a class="text-info">Announcement</a> : '. $announcement->title;
        $logs->save();

        session()->flash('message', 'Announcement Updated Successfully');
        return redirect('admin/announcement');
    }

    public function delete($announcement_id)
    {

        $announcement = Announcement::find($announcement_id);
        if(!$announcement->coverimage)
        {
            $announcement->delete();
        }else{
            unlink("upload/announcement/".$announcement->coverimage);
            $announcement->delete();
        }

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-danger"> Removed </span> ';
        $logs->action = '<a class="text-danger">Announcement</a> : '. $announcement->title;
        $logs->save();

        session()->flash('message', 'Announcement Successfully Deleted');
        return redirect('admin/announcement');

    }

    
    public function show($announcement_id)
    {
        $announcement = Announcement::find($announcement_id);
        return view ('admin._announcement.show', compact('announcement'));
    }


    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Announcement::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
