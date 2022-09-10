<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logs;
use App\Models\News;
use App\Models\User;
use App\Models\Services;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\UserFormRequest;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);    
    }


    public function index()
    {
        if(Auth::user()->is_admin == 1)
        {
            $users = User::all();
        }
        else
        {
            return redirect('admin/dashboard')->with('denied', "You don't have Admin Access to Users Page");
        }
        
        return view ('admin._user.index',compact('users'));
    }


    public function edit($user_id)
    {
        $user_name = User::find($user_id);
        if(Auth::user()->id == $user_id)
        {
            $user = User::find($user_id);
        }
        elseif(Auth::user()->is_admin == 1)
        {
            $user = User::find($user_id);
        }else
        {
            return redirect('admin/dashboard')->with('denied', " You don't have Admin Access to Edit or Update this user");
        }
        
        
        return view('admin._user.edit', compact('user'));
    }

    public function update(UserFormRequest $request, $user_id)
    {
        $data = $request->validated();
        $user = User::find($user_id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->status = $data['status'];
        $user->user_id = $data['user_id'];
        $user->is_admin = $request->input('is_admin');
        $user->contact = $request->input('contact');

        if($request->password !== null)
        {
            $user->password = bcrypt($request->input('password'));
        }

        if($request->hasfile('profilePic')){
            $file = $request->file('profilePic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/user/', $filename);
            $user->profile_img = $filename;
        }
        
        $user->update();

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-info"> Updated </span>';
        $logs->action = '<a class="text-info">User </a>:'. $user->name;
        $logs->save();

        session()->flash('message', 'User Updated Successfully');
        return redirect('admin/users/view/'.$user_id);
    }

    public function show($user_id)
    {

        if(Auth::user()->id == $user_id)
        {
            $user = User::find($user_id);
        }
        elseif(Auth::user()->is_admin == 1)
        {
            $user = User::find($user_id);
        }
        else
        {
            return redirect('admin/dashboard')->with('denied', "You don't have Admin Access to View this User");
        }
        $user_announcement = Announcement::where('created_by',$user_id)->get();
        $user_news = News::where('created_by',$user_id)->get();
        $user_services = Services::where('created_by',$user_id)->get();
        return view ('admin._user.show', compact(
            'user',
            'user_announcement',
            'user_news',
            'user_services',
        ));
    }

    public function create()
    {
        return view('admin._user.create');
    }

    public function store(UserFormRequest $request)
    {

        $data = $request->validated();

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_id' => ['unique:users']
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'user_id' => $request->input('user_id'),
            'contact' => $request->input('contact'),
            'status' => $request->input('status'),
            'is_admin' => $request->input('is_admin'),
        ]);

        if($request->hasfile('profilePic')){
            $file = $request->file('profilePic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/user/', $filename);
            $user->profile_img = $filename;
        }
        $user->save();
        
        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-success"> Created </span>';
        $logs->action = '<a class="text-success">User </a>:'. $user->name;
        $logs->save();
        
        session()->flash('message', 'User Successfully Registered');
        return redirect('admin/users');
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if(!$user->profile_img)
        {
            $user->delete();
        }else{
            // unlink("images/user/".$user->profile_img);
            $user->delete();
        }

        $logs = new Logs();
        $logs->user = Auth::user()->name;
        $logs->status = '<span class="badge p-2 bg-danger"> Removed </span>';
        $logs->action = '<a class="text-danger">User </a>:'. $user->name;
        $logs->save();

        session()->flash('message', 'User Successfully Deleted');
        return redirect('admin/users');
    }
}
