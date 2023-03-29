<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');      //THIS WILL MAKE EVERYTHING IN HERE AUTH PROTECTED
    }

    public function create(){
        return view('post.create');
    }
    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        
        // $post = new \App\Post();
        // $post->caption = $data['caption'];
        // $post->save();

        //\App\Post::create($data);
        $imagePath = request('image')->store('uploads', 'public');
       
        auth()->user()->post()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show (\App\Models\Post $post){
        return view('post.show', compact('post'));
    }

    public function index() 
    {
      $users = auth()->user()->following()->pluck('profiles.user_id'); 

      $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

      return view('post.index', compact('posts'));
    }
} 