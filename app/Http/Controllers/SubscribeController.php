<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SubscriberNotification;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {

        $subscriber = new Subscribers();
        $subscriber->email = $request->input('subs_email');

        Mail::raw('text sample email', function($message){
            $message->to('ariesyap125@gmail.com');
        });

        $subscriber->save();

        // $name = 'Cloudways';
        

        // $subscriber->notify(new SubscriberNotification($notifyData));
        
        return redirect()->back()->with('message','Thank You for Subscribing to our website');
    }
}
