@props(['post' => $post])

<div class="rounded p-4 bg-gray-100 my-5">
    <p class="">{{$post->body}}</p>
    <h4 class="text-sm font-bold">
        <a href="{{ route("users.posts", $post->user->username)}}">
            {{$post->user->name}}
        </a>
        </h4>
    <p class="text-sm">Data: {{$post->created_at->diffForHumans()}}</p>

    <div class="flex items-center">
        @auth
        @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
                @csrf
                <button type="submit" class="text-blue-500">Like</button>
            </form>
        @else
            <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
                @csrf
                @method("DELETE")
                <button type="submit" class="text-red-500">Unlike</button>
            </form>
        @endif


        @endauth
        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>

    </div>

    @can('delete', $post)
        <form action="{{route('posts.destroy', $post)}}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" class="bg-red-400 py-2 px-4 rounded text-white">Delete</button>
        </form>
    @endcan

</div>
