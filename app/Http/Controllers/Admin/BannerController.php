<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logs;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\BannerFormRequest;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('admin._banner.index', compact(
            'banner'
        ));
    }

    public function show($banner_id)
    {
        return view('admin._banner.show');
    }
    public function create()
    {
        return view('admin._banner.create');
    }

    public function store(BannerFormRequest $request)
    {   
        
        
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->link = $request->link;
        $banner->created_by = Auth::user()->id;
        if($request->hasfile('bannerimage')){
            $file = $request->file('bannerimage');
            $filename = $request->title . '.' . $file->getClientOriginalExtension();
            $file->move('upload/banner/', $filename);
            $banner->image = $filename;
        }
        $banner->save();

        $logs = new Logs();
        $logs->user = Auth::user()->fname;
        $logs->status = '<span class="badge p-2 bg-success"> Created </span> ';
        $logs->action = '<a class="text-success">Banner</a> : '. $banner->title;
        $logs->save();

        session()->flash('message', 'Banner <span class="text-success fw-bolder">'. $banner->title. '</span> Created');
        return redirect('admin/banner');
    }

    public function edit($banner_id)
    {
        $banner = Banner::find($banner_id);
        return view ('admin._banner.edit', compact('banner'));
    }

    public function update(BannerFormRequest $request, $banner_id)
    {   
        $data = $request->validated();
        $banner = Banner::find($banner_id);

        $banner->title = $data['title'];
        $banner->description = $data['description'];
        $banner->link = $request->input('link');
        $banner->created_by = $request->created_by;
        $banner->updated_by = Auth::user()->fname;
    
        if($request->hasfile('bannerimage')){
            $file = $request->file('bannerimage');
            $filename = $data['title'] . '.' . $file->getClientOriginalExtension();
            $file->move('upload/banner/', $filename);
            $banner->image = $filename;
        }

        
        $banner->update();

        $logs = new Logs();
        $logs->user = Auth::user()->fname;
        $logs->status = '<span class="badge p-2 bg-info"> Updated </span> ';
        $logs->action = '<a class="text-info">Banner</a> : '. $banner->title;
        $logs->save();

        session()->flash('message', 'Banner <span class="text-success fw-bolder">'. $banner->title. '</span> Updated');
        return redirect('admin/banner');
    }


    public function destroy($banner_id)
    {
        $banner = Banner::find($banner_id);
        if(!$banner->image)
        {
            $banner->delete();
        }else{
            unlink("upload/banner/".$banner->image);
            $banner->delete();
        }

        $logs = new Logs();
        $logs->user = Auth::user()->fname;
        $logs->status = '<span class="badge p-2 bg-danger"> Removed </span>';
        $logs->action = '<a class="text-danger">Banner</a> : '. $banner->title;
        $logs->save();

        session()->flash('message', 'Banner <span class="text-success fw-bolder">'. $banner->title. '</span> Deleted');
        return redirect('admin/banner');
    }
}
