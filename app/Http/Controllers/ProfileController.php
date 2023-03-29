<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(\App\Models\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = $user->post->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profile.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
          // [ 'user' => $user,]
    
    }
    public function edit(\App\Models\User $user)
    {   
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update(\App\Models\User $user)
    {
       
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            $imageArray = ['image' => $imagePath];
        }

        //Automatic check for auth user 
        auth()->user()->profile->update(array_merge(
            $data, 
            $imageArray ?? []
        ));
        return redirect("profile/{$user->id}");
    }

}
