<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logs;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServicesFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::orderBy('created_at','desc')->get();
        return view ('admin._services.index', compact('services'));
    }

    public function create()
    {
        return view('admin._services.create');
    }

    public function store(ServicesFormRequest $request)
    {
        $data = $request->validated();
    
    
        $services = new Services();
        $services->title = $data['title'];
        $services->status = $data['status'];
        $services->description = $data['description'];
        $services->download_count = 0;

        if($request->hasfile('file')){
            $file = $request->file('file');
            $filename = $data['title'] . '.' . $file->getClientOriginalExtension();
            $file->move('upload/services/', $filename);
            $services->file = $filename;
        }
        $services->created_by = Auth::user()->id;
        $services->save();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge bg-success"> Created </span>: ';
        $logs->action = '<a class="text-success">Services </a>: '. $services->title;
        $logs->save();
        
        session()->flash('message', 'Services <span class="text-success fw-bolder text-decoration-underline">'. $services->title. '</span> Created');
        return redirect('admin/services');
    }


    // UPDATED FUNCTION
    //
    public function edit($services_id)
    {
        $services = Services::find($services_id);
        return view ('admin._services.edit', compact('services'));
    }

    public function update(ServicesFormRequest $request, $services_id)
    {
        $data = $request->validated();
        $services = Services::find($services_id);
        $services->title = $data['title'];
        $services->status = $data['status'];
        $services->description = $data['description'];

        
        $services->created_by = $request->input('created_by');
        $services->updated_by = Auth::user()->name;
        $services->update();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-info"> Updated </span>';
        $logs->action = '<a class="text-info">Services </a>: '. $services->title;
        $logs->save();

        session()->flash('message', 'Services <span class="text-success fw-bolder text-decoration-underline">'. $services->title. '</span> Updated');
        return redirect('admin/services');
    }
    //
    // END OF UPDATE FUNCTION




    public function show($services_id)
    {
        $services = Services::find($services_id);
        return view ('admin._services.show', compact('services'));
    }

    public function destroy($services_id)
    {
        $services = Services::find($services_id);
        if(!$services->coverimage)
        {
            $services->delete();
        }else{
            unlink("upload/services/".$services->coverimage);
            $services->delete();
        }

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge bg-danger"> Removed </span>: ';
        $logs->action = '<a class="text-danger">Services </a>:'. $services->title;
        $logs->save();

        session()->flash('message', 'Services <span class="text-success fw-bolder text-decoration-underline">'. $services->title. '</span> Deleted');
        return redirect('admin/services');
    }

    

}
