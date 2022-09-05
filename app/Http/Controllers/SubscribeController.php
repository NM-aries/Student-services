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

        $subs_email = array([
            'subs_email' => $request['subs_email']
        ]);

        $subscriber = new Subscribers();
        $subscriber->email = $request->input('subs_email');

        Mail::raw('text sample email', function($message) use ($subs_email){  
            $subscriber_email = $subs_email['subs_email'];          
            $message->to($subscriber_email)
            ->subject('Thank you for Subscribing to our Website'); 
        });

        // Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['email'], $email_data['name'])
        //         ->subject('Welcome to MyNotePaper')
        //         ->from('info@mynotepaper.com', 'MyNotePaper');
        // });



        $subscriber->save();

        // $name = 'Cloudways';
        

        $subscriber->notify(new SubscriberNotification($notifyData));
        
        return redirect()->back()->with('message','Thank You for Subscribing to our website');
    }
}
