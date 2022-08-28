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
        $data = $request->validated();

        $banner = new Banner();
        $banner->title = $data['title'];
        $banner->status = $data['status'];
        $banner->slug = Str::slug($data['slug']);
        $banner->description = $data['description'];

        if($request->hasfile('coverimage')){
            $file = $request->file('coverimage');
            $filename = $data['slug'] . '.' . $file->getClientOriginalExtension();
            $file->move('upload/banner/', $filename);
            $banner->coverimage = $filename;
        }
        $banner->created_by = Auth::user()->id;
        $banner->save();
        

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge bg-success"> Created </span> ';
        $logs->action = 'Banner : '. $banner->title;
        $logs->save();

        session()->flash('message', 'Banner Created Successfully');
        return redirect('admin/banner');
    }

    public function edit($banner_id)
    {
        $banner = Banner::find($banner_id);
        return view ('admin._banner.edit', compact('banner'));
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
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge bg-danger"> Removed </span>';
        $logs->action = 'Banner : '. $banner->title;
        $logs->save();

        session()->flash('message', 'Banner Successfully Deleted');
        return redirect('admin/banner');
    }
}
