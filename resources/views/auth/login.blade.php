@extends('layouts.app')

@section('content')

    <h1 class="flex justify-center mt-6">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Login

            <form action="{{route('login')}}" method="post" class="mt-4">
                @csrf

                @if(session('status'))
                    <div class="bg-red-400 p-6 rounded my-4 text-white text-center">
                        {{session('status')}}
                    </div>
                @endif

                <div>

                </div>

                <div class="mb-5">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{old('email')}}" id="email" class="bg-gray-100 border-2 w-full rounded p-4 @error('email') border-red-400 @enderror">
                    @error('email')
                        <x-message :message="$message"/>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-100 border-2 w-full rounded p-4 @error('password') border-red-400 @enderror">
                    @error('password')
                        <x-message :message="$message"/>
                    @enderror
                </div>

                <div class="mb-5">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>


                <div class="mb-5">
                    <button type="submit" class="w-full text-white rounded py-4 bg-emerald-300">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </h1>

@endsection
