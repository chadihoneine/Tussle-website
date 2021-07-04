<?php

namespace App\Http\Controllers\Auth;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
    {
        return view('login');
    }

    public function process_login(Request $request)
    {
        if ($request->expectsJson()) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required',
            ]);
            $user = Account::where('email', $request->email)->where('password', $request->password)->first();
            if (!$user) {
                return response('Login invalid', 503);
            }
//            $r = json_decode($request);
//            return response()->json(["message" => "".$user->email], 201);
            return $user->createToken($request->device_name);
        }
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
//        $credentials = $request->except(['_token']);
        $user = Account::where('email', $request->email)->where('password', $request->password)->first();
        if ($user != null) {
            Auth::login($user);
            //------------------------------------
//            if(\Request::acceptsJson()) {
//                return response()->json($user);
//            } else {
            return redirect(url('/'));
//            }
            //------------------------------------
        } else {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function show_signup_form()
    {
        return view('backend.register');
    }

    public function process_signup(Request $request)
    {
        $request->validate([
//            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = Account::create([
//            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);
        if (!$user) {
            return redirect()->route('login');
        }
        session()->flash('message', 'Your account is created');
        return redirect(url('/'));
    }

    public function logout(Request $request)
    {
        if ($request->expectsJson()) {
            $user = auth('sanctum')->user();
            if ($user) {
                $user->currentAccessToken()->delete();
            }
//            $request->user()->currentAccessToken()->delete();
//            $header = $request->header('Authorization');
//            $id =
//            $user = Account::where('accountID', $id)->first();
//            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        } else {
            Auth::logout();
            return redirect(url('/'));
        }
    }
}
