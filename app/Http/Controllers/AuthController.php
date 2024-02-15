<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }

    
    public function index()
    {
        return view('pages.auth.main');
    }


    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            if(Auth::user()->role == 'admin'){
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('admin.index'),
                ]);
            }elseif(Auth::user()->role == 'user'){
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('user.index'),
                ]);
            }elseif(Auth::user()->role == 'rental'){
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('rental.index'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Welcome back '. Auth::user()->name,
                    'callback' => route('user.index'),
                ]);
            }
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.',
            ]);
        }
    }

    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users|max:255|email',
            'username' => 'required|unique:users|max:25|min:8|alpha_num',
            'password' => 'required|min:8',
            'repassword' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('firstname')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('firstname'),
                ]);
            } elseif ($errors->has('lastname')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('lastname'),
                ]);
            } elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            } elseif ($errors->has('repassword')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('repassword'),
                ]);
            }
        }
        
        $user = new User;
        $user->name = $request->firstname.' '.$request->lastname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->email_verified_at = now();
        $user->role = 'user';
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Thankyou For join ' . $request->name,
            'callback' => route('user.index'),
        ]);
        
    }
    
    public function do_logout()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect('auth');
    }
}