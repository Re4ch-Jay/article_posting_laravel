<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        /**  TODO:
         * validation
         * store
         * sign in the user
         * redirect
        */

        /** fist way */

        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'username' => 'required|max:255',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed',
        // ]);

        /** second way */

        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }

}

