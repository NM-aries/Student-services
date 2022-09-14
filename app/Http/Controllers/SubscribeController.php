<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SubscriberNotification;

class SubscribeController extends Controller
{
    public function index()
    {
        $subs = Subscribers::all();
        return view('admin._subscribers.index' , compact('subs'));
    }


    public function subscribe( Request $request)
    {
        $this->validate($request,[
            'email'=>'unique:subscribers'
         ]);

        $subscriber = new Subscribers();
        $subscriber->email = $request->input('email');
        $subscriber->name = $request->input('name');
        $subscriber->save();

        $subscriber->notify(new SubscriberNotification($subscriber));
        
        return redirect()->back()->with('message','Thank You for Subscribing to our website');
    }

    public function sendEmail(Request $request)
    {
        $users = Subscribers::all();

        $data = [
            'title'=>$request->title,
            'description'=>$request->description
        ];
        foreach($users as $key =>$user){
            Mail::to($user->email)->send(new SendEmail($data));
        }
    
        session()->flash('message', 'Email Successfully Sent');
        return redirect()->back();
    }
}
