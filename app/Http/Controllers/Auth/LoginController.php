<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        /**
         * TODO:
         * login user
         *
         */
        // fist way
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
         ]);

         // second way

        //  $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        if(! auth()->attempt($credentials, $request->remember)){
            return back()->with('status', 'Invalid login');
        }

        return redirect()->route('dashboard');
    }


}
