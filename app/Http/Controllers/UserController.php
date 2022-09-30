<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::where('id', Auth::user()->id)->first();    
        $users = User::all();  
        // dd($users);
        return view('dashboard_admin.user.index',compact('users'));
    }

    // public function restoran()
    // {
    //     // $users = User::where('id', Auth::user()->id)->first();    
    //     $restorans = restoran::all();  
    //     // dd($users);
    //     return view('dashboard_admin.restoran',compact('users'));
    // }

    public function search(Request $request)
    {
        if($request->has('search')) {
            $user = User::where('name', 'LIKE','%'.$request->search.'%')->get();  
        }
        else {
            $user = User::all();
        }

        return view('dashboard_admin.user.index',['user' => $user]);
    }

    public function create()
    {
        $user = User::all();
        return view('dashboard_admin.create', [
            'users' => $user
        ]);
    }

    public function store(Request $request, User $user)
    {
        $user = new User();
        // $user_c = User::all();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = $request->input('password');
        $user->save();

        if($request->hasfile('image'))
        {
            $request->file('image')->move('uploads/profile/', $request->file('image')->getClientOriginalName());
            // $driver->foto_motor = $request->file('foto_motor')->getClientOriginalName();
            $user->image = $request->file('image')->getClientOriginalName();
            $user->save();
        }   

        // return User::create([
        //     'name' => $user['name'],
        //     'email' => $user['email'],
        //     'password' => bcrypt($user['password']),
        //     'role' => $user['role'],
        // ]);

        // if($request->hasfile('image'))
        // {
        //     $request->file('image')->move('uploads/profile/', $request->file('image')->getClientOriginalName());
        //     $user->image = $request->file('image')->getClientOriginalName();
        //     $user->save();
        // }
        return redirect(route('indexUser'));
    }
    

    public function editUSer(Request $request, $id)
    {
        $users = User::find($id);
        return $user;
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        // $user_id = Auth::user()->id;
        // $user = User::findOrFail($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        
        if($request->hasfile('image'))
        {
            $destination = 'uploads/profile/' .$user->image;
            if(File::exists($destination)){
                File::delete($destination);
                
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            // $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $extension);
            $user->image = $extension;
        }
        
        $user->update();
        return redirect(route('indexUser'));
    }

    public function destroyUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(File::exists("image/".$user->image))
        {
            File::delete("image/".$user->image);
        }
        $user->delete();
        return back();
    }

}
