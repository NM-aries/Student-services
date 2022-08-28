<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Banner;
use App\Models\News;
use App\Models\Services;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function index()
    {
        $banner = Banner::orderBy('created_at', 'desc')->take(5)->get();
        $other_news = News::where('status','1')->orderBy('created_at', 'desc')->take(10)->get();
        return view('welcome', compact('other_news','banner'));
    }

    public function news()
    {
        $allNews = News::orderBy('created_at','desc')->get();
        return view('news', compact('allNews'));
    }

    public function show_news($slug)
    {
        $news_details = News::where('slug', $slug)->firstOrFail();
        $next = News::where('id', '<', $news_details->id)->max('id');
        $prev = News::where('id', '>', $news_details->id)->min('id');
        return view('pages.news_view',)
            ->with('news_details',$news_details)
            ->with('next' , News::find($next))
            ->with('prev', News::find($prev));
    }

    public function announcements()
    {
        $allAnnouncement = Announcement::orderBy('created_at','desc')->get();
        return view('announcement', compact('allAnnouncement'));
    }

    public function show_announcements($slug)
    {
        $announcement_details = Announcement::where('slug',$slug)->get();
        $next = News::where('id', '<', $announcement_details->id)->max('id');
        $prev = News::where('id', '>', $announcement_details->id)->min('id');
        return view('pages.announcement_view',)
            ->with('announcement_details',$announcement_details)
            ->with('next' , News::find($next))
            ->with('prev', News::find($prev));
    }

    public function services()
    {
        $allServices = Services::orderBy('created_at','desc')->get();
        return view('services', compact('allServices'));
    }

    
}
