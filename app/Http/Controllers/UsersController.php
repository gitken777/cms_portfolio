<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users',User::all());
    }

    public function makeAdmin(User $user)
    {
        if(!auth()->user()->isAdmin()) {
            session()->flash('error', '管理者のみが管理者権限を与えることができます。');
            return redirect()->back();
        }else{

            $user->role = 'admin';
            $user->save();
            session()->flash('success', '管理者権限を与えました。');
            return redirect()->back();}
    }
    public function edit(){
        return view('users.edit')->with('user',auth()->user());
    }
    public function update(UpdateProfileRequest $request){
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about,
        ]);
        session()->flash('success','プロフィールが更新されました。');
        return redirect()->back();
    }
}
