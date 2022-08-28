<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\UserFormRequest;
use App\Models\Announcement;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth' ,'superAdmin']);
    }


    public function index()
    {
        $users = User::all();
        return view ('admin._user.index',compact('users'));
    }


    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin._user.edit', compact('user'));
    }

    public function update(UserFormRequest $request, $user_id)
    {
        $data = $request->validated();

        

        $user = User::find($user_id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->status = $data['status'];
        $user->username = $data['username'];
        $user->is_admin = $request->input('is_admin');
        $user->contact = $request->input('contact');

        if($request->hasfile('profilePic')){
            $file = $request->file('profilePic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/profile_img/', $filename);
            $user->profile_img = $filename;
        }
        
        $user->update();
        return redirect('admin/user')->with('status', 'User Updated Successfully');
    }

    public function show($user_id)
    {
        $user = User::find($user_id);
        $user_announcement = Announcement::where('created_by',$user_id)->get();
        return view ('admin._user.show', compact('user','user_announcement'));
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
            'username' => ['unique:users']
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'username' => $request->input('username'),
            'contact' => $request->input('contact'),
            'status' => $request->input('status'),
            'is_admin' => $request->input('is_admin'),
        ]);

        if($request->hasfile('profilePic')){
            $file = $request->file('profilePic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/profile_img/', $filename);
            $user->profile_img = $filename;
        }
        $user->save();
        
        notify()->success('User Registered Successfully', 'Congratulation');
        return redirect('admin/user');
    }
}
