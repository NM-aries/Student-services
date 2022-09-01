<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index()
    {
        $logs = Logs::orderBy('id','desc')->get();

        // dd($sorted);
        return view('admin._logs.index',compact(
            'logs'
        ));
    }
}
