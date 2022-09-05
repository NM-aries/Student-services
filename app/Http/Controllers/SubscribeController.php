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

        $subs_email = array([
            'subs_email' => $request['subs_email']
        ]);

        Mail::send('welcome_email',$subs_email, function($message) use ($subs_email){       
            $message->to($subs_email['subs_email'])
            ->subject('Thank you for Subscribing to our Website'); 
        });

        $subscriber = new Subscribers();
        $subscriber->email = $request->input('subs_email');
        $subscriber->save();

        // $name = 'Cloudways';
        

        $subscriber->notify(new SubscriberNotification($notifyData));
        
        return redirect()->back()->with('message','Thank You for Subscribing to our website');
    }
}
