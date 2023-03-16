<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(\App\Models\User $user)
    {
        
        return view('profile.index', compact('user'));
          // [ 'user' => $user,]
    
    }
    public function edit(\App\Models\User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(\App\Models\User $user)
    {
       

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        $user->profile->update($data);

        return redirect("profile/{$user->id}");
    }

}
