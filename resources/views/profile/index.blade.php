@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  justify-content-center d-flex" >
        <div class="col-4 pt-5" >
            <div class="text-end">
                <img src="https://media.licdn.com/dms/image/C4D03AQHvMyL3vHmkyQ/profile-displayphoto-shrink_200_200/0/1653895935612?e=1683763200&v=beta&t=7FyF43MyFEY7EV0gcnig38GjjxbZjK-V3X0F4tOGdt8" alt="" class="rounded-circle" style="height: 150px; width: 150px">
            </div>
        </div>
        <div class="col-8 pt-5 ps-5">
            

            @can ('update', $user->profile)
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
                <a href="/profile/{{ $user-> id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pe-4"><strong>{{ $user->post->count() }}</strong> posts</div>
                <div class="pe-4"><strong>10k</strong> followers</div>
                <div class="pe-4"><strong>200</strong> following</div>
            </div>
            <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
            <div>{{ $user->profile->description }}</div>
            <div>
                <a href="#">{{ $user->profile->url ?? 'Añade tu dirección de contacto aquí'}}</a>
            </div>

        </div>
        
    <div class="row pt-5">
        @foreach($user->post as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100" style="height: 250px;">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
