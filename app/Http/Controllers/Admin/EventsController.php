<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Logs;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $events = Events::Paginate(10);
        return view('admin._events.index', compact('events'));
    }
    public function add_event(Request $request)
    {
        $event = new Events();
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->organizer = $request->organizer;
        $event->textColor = $request->textColor;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $request->title . '.' . $file->getClientOriginalExtension();
            $file->move('upload/event/', $filename);
            $event->image = $filename;
        }
        $event->backgroundColor = $request->backgroundColor;
        $event->save();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-success"> Created </span> ';
        $logs->action = '<a class="text-success">Event</a> : '. $event->title;
        $logs->save();

        session()->flash('message', 'Event Successfully Created');

        return redirect()->back();
    }

    public function edit_event(Request $request, $id)
    {
        $event = Events::find($id);
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->organizer = $request->organizer;
        $event->textColor = $request->textColor;
        $event->backgroundColor = $request->backgroundColor;

        $event->update();

        return redirect()->back();
    }
    public function destroy($id)
    {
        $event = Events::find($id);
        $event->delete();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-danger"> Removed </span>';
        $logs->action = '<a class="text-danger">Event</a> : '. $event->title;
        $logs->save();

        session()->flash('message', 'Event Successfully Deleted');
        return redirect()->back();
    }
 
    
}
