<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SubscriberNotification;

use Twilio\Rest\Client;

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
        // $subscriber->contact_number = $request->input('contact_number');
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

    // public function sms()
    // {
    //     $subs = Subscribers::all();
    //     return view('admin._subscribers.sms' , compact('subs'));
    // }

    // public function sendSms(Request $request)
    // {
    
    //     try{
    //         $sid    = "AC9b189ce47f71ad16432f7f0bcc496d23"; 
    //         $token  = "21be333c43a5bc512dd0f857f6e97acc";
    //         $number = "+19378723140";
    //         $twilio = new Client($sid, $token); 
         
    //     $twilio->messages->create('+63'.$request->contact_number, [
    //                 'from' => $number,
    //                 'body' => $request->message
    //             ]); 

    //             return 'message sent';
    //     }catch(\Exception $e)
    //     {
    //         return   $e->getMessage();
    //     }
        
         
        // print($message->sid);        

}
