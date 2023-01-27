@extends('layouts.app')

@section('content')

    <h1 class="flex justify-center mt-6">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-2xl font-bold">All posts</h1>

            @auth
                <form action="{{route('posts')}}" method="post" class="mt-4">
                    @csrf
                    <div class="mb-5">
                        <label for="body" class="sr-only">Body</label>
                        <textarea type="text" value="{{old('body')}}"
                        placeholder="Your post...."
                        name="body" id="body" class="bg-gray-100 border-2 w-full rounded p-4 @error('name') border-red-400 @enderror"></textarea>

                        @error('body')
                            <x-message :message="$message"/>
                        @enderror

                    </div>

                    <div class="mb-5">
                        <button type="submit" class="w-full text-white rounded py-4 bg-emerald-300">
                            Post
                        </button>
                    </div>
                </form>

            @endauth



            <div class="my-5">
                @if ($posts->count())
                    @foreach ($posts as $post)
                    <a href="posts/{{$post->id}}">
                        <x-post :post="$post" />
                    </a>
                    @endforeach
                    <div>
                        {{$posts->links()}}
                    </div>
                @else
                    <h3 class="text-red-400">There are no post</h3>
                @endif
            </div>

        </div>
    </h1>

@endsection
