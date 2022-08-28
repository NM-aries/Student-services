<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\News;
use App\Models\Services;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $announcement = Announcement::all()->count();
        $news = News::all()->count();
        $services = Services::all()->count();


        return view('admin.index',compact(
            'users',
            'announcement',
            'news',
            'services',
        ));
    }

}
