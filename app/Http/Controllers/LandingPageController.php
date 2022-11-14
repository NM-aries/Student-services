<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Banner;
use App\Models\Events;
use App\Models\Feedback;
use App\Models\Services;
use App\Models\Announcement;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function index()
    {
        $banner = Banner::orderBy('created_at', 'desc')->take(10)->get();
        $other_news = News::where('status',1)->orderBy('created_at', 'desc')->take(10)->get();
        $other_announcements = Announcement::where('status','1')->orderBy('created_at', 'desc')->take(10)->get();
        $other_services = Services::where('status','1')->orderBy('created_at', 'desc')->take(10)->get();
        
        return view('welcome', compact(
            'other_news',
            'other_announcements',
            'other_services',
            'banner'
        ));
    }

//NEWS LANDING

    public function news()
    {
        $allNews = News::where('status', 1)->orderBy('created_at','desc')->Paginate(10);
        return view('news', compact('allNews'));
    }

    public function show_news($slug)
    {
        $news_details = News::where('slug', $slug)->firstOrFail();
        $next = News::where('id', '<', $news_details->id)->max('id');
        $prev = News::where('id', '>', $news_details->id)->min('id');
        return view('pages._news-show',)
            ->with('news_details',$news_details)
            ->with('next' , News::find($next))
            ->with('prev', News::find($prev));
    }


    public function nVisitCount(Request $request, $id)
    {
        $news = News::find($id);
        $news->visit_count = $request->input('visit_count');
        $news->update();
        return redirect('university_news/'.$news->slug);
    }

//ANNOUNCEMENTS LANDING

    public function announcements()
    {
        $allAnnouncement = Announcement::orderBy('created_at','desc')->Paginate(10);
        return view('announcement', compact('allAnnouncement'));
    }

    public function show_announcement($slug)
    {
        $announcement_details = Announcement::where('slug', $slug)->firstOrFail();
        $next = Announcement::where('id', '<', $announcement_details->id)->max('id');
        $prev = Announcement::where('id', '>', $announcement_details->id)->min('id');
        return view('pages._announcements-show',)
            ->with('announcement_details',$announcement_details)
            ->with('next' , Announcement::find($next))
            ->with('prev', Announcement::find($prev));
    }

    public function aVisitCount(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        $announcement->visit_count = $request->input('visit_count');
        $announcement->update();
        return redirect('university_announcements/'.$announcement->slug);
    }

// SERVICES
    public function services()
    {
        $allServices = Services::orderBy('created_at','desc')->get();
        return view('services', compact('allServices'));
    }

    public function servicesDownload(Request $request, $id)
    {
        $services = Services::find($id);
        $services->download_count = $request->input('download_count');
        $services->update();
        return redirect()->back();
    }

//EVENTS
    public function events()
    {
        $allEvents = Events::orderBy('start', 'asc')->Paginate(10);
        return view('events', compact('allEvents'));
    }

    public function show_events($title)
    {
        $event = Events::where('title', $title)->firstOrFail();
        return view('pages._events-show', compact('event'));
    }

    // FAQ

    public function faq()
    {
        return view ('faq');
    }

    public function feedback(Request $request)
    {
        $feedback = new Feedback();
        $feedback->name = $request->input('txtName');
        $feedback->email = $request->input('txtEmail');
        $feedback->contact = $request->input('txtPhone');
        $feedback->description = $request->input('txtMsg');

        // dd($feedback);
        $feedback->save();

        return redirect()->back()->with('message','Thank you sending us your feedback');

    }
}
