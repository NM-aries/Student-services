<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\User;
use App\Models\Banner;
use App\Models\Services;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $announcement = Announcement::all()->count();
        $news = News::all()->count();
        $services = Services::all()->count();
        $banner = Banner::orderBy('created_at', 'desc')->take(5)->get();


        return view('admin.index',compact(
            'users',
            'announcement',
            'news',
            'services',
            'banner'
        ));
    }

}
