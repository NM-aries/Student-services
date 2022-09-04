<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use App\Notifications\SubscriberNotification;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {

        $subscriber = new Subscribers();
        $subscriber->email = $request->input('subs_email');

        $subscriber->save();

        $notifyData = [
            'body' => 'Thank you for Subscribing on our Website YOu will receive Email on Latest News & Announcements',
            'text' => 'Visit Our Website',
            'url'   => url('/'),
            'footer' => 'Thank you for using our application!'
        ];
        $subscriber->notify(new SubscriberNotification($notifyData));
        
        return redirect()->back()->with('message','Thank You for Subscribing to our website');
    }
}
