<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(){
        return view('register');
    }
    public function register( Request $request){
        $rules = [
            'login' => ['required', 'string', 'min:6', 'unique:users', 'regex:/^[a-zA-Z0-9_-]+$/'],
            'password' => ['required', 'string', 'min:8' ],
            'name' => ['required', 'string', 'regex:/^[а-яА-ЯёЁ\s]+$/u'],
            'phone' => ['required', 'regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ];
        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'name'=> $request->name,
                'phone' =>$request->phone,
                'email' =>$request->email,
                'role' => 'user'
            ]   );
        Auth::login($user);
        return redirect('/applications');




    }


    public function login(Request $request){
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        if ($request->login === 'Admin' && $request->password === 'KorokNET') {
            $admin = User::firstOrCreate(
                ['login' => 'Admin'],
                [
                    'name' => 'Administrator',
                    'password' => Hash::make('KorokNET'),
                    'email' => 'admin@example.com',
                    'phone' => '8(000)000-00-00',
                    'role' => 'admin'
                ]
            );

            Auth::login($admin);
            return redirect()->route('admin.index');
        }
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            return redirect('/');
        }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль'
        ]);
    }

    public function formLogin(){
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/applications');
    }



}
