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

        $subscriber->save();

        // $name = 'Cloudways';
        

        $notifyData = [
            'body' => 'Thank you for Subscribing on our Website YOu will receive Email on Latest News & Announcements',
            'text' => 'Visit Our Website',
            'url'   => url('/'),
            'footer' => 'Thank you for using our application!'
        ];
        Mail::to('Cloudways@Cloudways.com')->send(new SubscriberNotification($notifyData));

        // $subscriber->notify(new SubscriberNotification($notifyData));
        
        return redirect()->back()->with('message','Thank You for Subscribing to our website');
    }
}
