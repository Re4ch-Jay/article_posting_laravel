@extends('layouts.app')

@section('content')

    <h1 class="flex justify-center mt-6">

        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="mb-6">
                <div class="flex flex-row justify-between">
                    <div>
                        <h1 class="text-2xl font-bold">{{$user->name}}</h1>
                    </div>
                    <div class="text-end my-5">
                        <h1 class="text-md">Username <strong>{{$user->username}}</strong> </h1>
                        <h1 class="text-md">Email <strong>{{$user->email}}</strong> </h1>
                        <p class="text-md">Joined on {{$user->created_at}}</p>
                        <p class="text-md">Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}}</p>
                        <p class="text-md">Like recieved {{$user->recievedLikes->count()}}</p>
                    </div>
                </div>
            </div>
           @if ($posts->count())
           @foreach ($posts as $post)
                <x-post :post="$post" />
           @endforeach
           <div>
               {{$posts->links()}}
           </div>
       @else
           <h3 class="text-red-400">There are no post</h3>
       @endif
        </div>
    </h1>

@endsection
