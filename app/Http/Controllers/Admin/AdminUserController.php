<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('admin.user.show', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $user = new User();

        $name = strtolower(str_replace(" ", "-", $request->input('name')));
        $pass = bcrypt($request->input('password'));

        // dd($request->file('avatar'));
        if($request->file('avatar')){
            $file = $request->file('avatar');
            $filename = $name.'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/admin/img/avatar/', $filename);

            $user->avatar = $filename;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $pass;
        $user->role_id = $request->input('role');

        $user->save();

        return back()->with('res','Usuario creado con éxito');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $aold = $user->avatar;

        $name = strtolower(str_replace(" ", "-", $request->input('name')));

        $pass = bcrypt($request->input('password'));

        // dd($request->file('avatar'));

        if(!is_null($request->file('avatar'))){
            if(file_exists(public_path('/admin/img/avatar/'.$aold))){
                unlink(public_path('/admin/img/avatar/'.$aold));
            }
        }

        if($request->file('avatar')){
            $file = $request->file('avatar');
            $filename = $name.'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/admin/img/avatar/', $filename);

            $user->avatar = $filename;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if(!is_null($request->input('password'))){
            $user->password = $pass;
        }
        $user->role_id = $request->input('role');

        $user->save();

        return redirect()->route('user.index')
                        ->with('res','Usuario editado con éxito');        

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $avatar = $user->avatar;

        if(file_exists(public_path('/admin/img/avatar/'.$avatar))){
            unlink(public_path('/admin/img/avatar/'.$avatar));
        } 
        
        $user->delete();

        return back()->with('res','Resgistro eliminado');

    }
}
