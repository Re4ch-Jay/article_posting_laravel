@extends('layouts.app')

@section('content')

    <h1 class="flex justify-center mt-6">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Register

            <form action="{{route('register')}}" method="post" class="mt-4">
                @csrf
                <div class="mb-5">
                    <label for="name">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" id="name" class="bg-gray-100 border-2 w-full rounded p-4 @error('name') border-red-400 @enderror">

                    @error('name')
                        <x-message :message="$message"/>
                    @enderror

                </div>
                <div class="mb-5">
                    <label for="username">Username</label>
                    <input type="text" value="{{old('username')}}" name="username" id="username" class="bg-gray-100 border-2 w-full rounded p-4 @error('username') border-red-400 @enderror"">
                    @error('username')
                        <x-message :message="$message"/>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{old('email')}}" id="email" class="bg-gray-100 border-2 w-full rounded p-4 @error('email') border-red-400 @enderror"">
                    @error('email')
                        <x-message :message="$message"/>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-100 border-2 w-full rounded p-4 @error('password') border-red-400 @enderror"">
                    @error('password')
                        <x-message :message="$message"/>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-100 border-2 w-full rounded p-4 @error('password_confirmation') border-red-400 @enderror"">
                    @error('password_confirmation')
                        <x-message :message="$message"/>
                    @enderror
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
