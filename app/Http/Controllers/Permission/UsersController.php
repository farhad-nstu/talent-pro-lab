<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('permission.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        return view('permission.users.create', [
            'user' => ""
        ]);
    }

    public function edit(User $user)
    {
        return view('permission.users.create', [
            'user' => $user
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $id = $request->user_id;
        if(! $id){
            $user = User::create($request->validated());
            Mail::to($user->email)->send(new RegisterMail($user));
        }else{
            $user = User::find($id);
            $user->update($request->validated());
        }
        return redirect()->route('users.index')
                ->withSuccess(__('User created successfully.'));
    }

    public function assignRoleToUser(Request $request) {
        if(DB::table('model_has_roles')->where('model_id',$request->user_id)->first()) {
            DB::table('model_has_roles')->where('model_id',$request->user_id)->update(['role_id'=>$request->role_id]);
        } else {
            $user = User::find($request->user_id);
            $user->assignRole([$request->role_id]);
        }
        return back()->with('success', 'Role assigned successfully.');
    }
}
