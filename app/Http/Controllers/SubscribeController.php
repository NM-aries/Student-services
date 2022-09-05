<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SubscriberNotification;

class SubscribeController extends Controller
{
    public function subscribe( Request $request)
    {

        $subscriber = new Subscribers();
        $subscriber->email = $request->input('subs_email');
        $subscriber->name = $request->input('name');
        $subscriber->save();

        
        $subscriber->notify(new SubscriberNotification($subscriber));
        
        return redirect()->back()->with('message','Thank You for Subscribing to our website');
    }
}
