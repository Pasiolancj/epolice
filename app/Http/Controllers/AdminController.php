<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->paginate(3);
        return view('admin.users', compact('users'))->with('i', (request()->input('page', 1)- 1)* 5);
    }
    public function create()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function store(Request $request)
    {
        $users = new User;
        $users ->name =$request ->input('name');
        $users ->email =$request ->input('email');
        $users->password = Hash::make($request->input('password'));
        $users ->is_admin =$request ->input('is_admin', false);
        $users -> save();
        return redirect()->back()->with(['addSuccess'=> true]);  
    }
    
    public function edit($id)
    {
        $users = User::find($id);
        return response()->json([
            'status' => 200 ,
            'users' => $users,
        ]);
       // return view('admin.users')->with('users', $users);
    }
    
    public function update(Request $request)
    {
        $users_id = $request -> input('users_id');
        $users = User::find($users_id);
        $users->name = request('name');
        $users->email = request('email');
        $users->is_admin = request('is_admin', false);
        $users->update();

        return redirect()->back()->with(['updateSuccess' => true]);
        //return redirect('admin/users')->with('message', 'Updated!');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin/users')->with(['Delete' => true]);
    }
    public function show($id)
    {
        $users = User::find($id);
        return response()->json($users);
    }
}
