<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\ResetPasswordToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function regisForm ()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $file=$request->file('foto');
        $name=$file->getClientOriginalName();
        $path= 'storage/gambar/user/';
        $file->move($path,$name);
        $foto = $name;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $foto
        ]);

        return redirect()->route('login.form')->with('success', 'Registration successful, please login.');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function forgot_password ()
    {
    return view ('auth.forgot-password');
    }
  

    public function forgot_password_act (Request $request){
        $customMessage = [
            'email.exist' => 'Email tidak terdaftar'
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ],$customMessage);

        $token = \Str::random(60);

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ],
            [
            'email' => $request -> email,
            'token' => $token,
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('forgot-password')->with('success', 'Kami telah mengirimkan anda Email untuk perubahan Password');
    }


    public function validasi_forgot_password (Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token',$token)->first();

        if(!$getToken){
            return redirect()->route('forgot-password')->with('failed' ,'Token tidak valid');
        }
        return view('auth.validasi-token', compact('token'));
    }

    public function validasi_forgot_password_act(Request $request){
        $customMessage = [
            'password.required' => 'Password tidak boleh kosong'
        ];

        $request->validate([
            'password' => 'required|min:8'
        ],$customMessage);

        $token = PasswordResetToken::where('token',$request->token)->first();

        if(!$token){
            return redirect()->route('login')->with('failed' ,'Token tidak valid');
        }

        $user = User::where('email',$token->email)->first();

        if(!$user){
            return redirect()->route('login')->with('failed' ,'Email tidak valid');
        }

        $user->update([
            'password'=>Hash::make($request->password)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password telah berhasil di ubah');

    }
}
