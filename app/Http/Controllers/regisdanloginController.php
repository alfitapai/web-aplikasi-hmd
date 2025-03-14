<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class regisdanloginController extends Controller
{
    public function prosdaftar(Request $request)
    {
        $valid = Validator::make($request->all(), [
            // 'userid' => ['required', 'max:12', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{1,12}$/'],
            'userid' => 'required|max:12',
            // 'name' => 'required|max:80',
            'email' => 'required|email|unique:users|ends_with:gmail.com,mailnator.com',
            'password' => 'required|min:8',
            'conf_passwd'=>'same:password',
        ], [
            'required' => 'Kolom :attribute Wajib Diisi',
            'email' => 'Format Email Salah',
            'unique' => 'Email sudah terdaftar',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'ends_with' => 'Email Wajib gmail',
            // 'regex' => 'Kolom :attribute harus berisi huruf besar, huruf kecil, dan angka maksimal 12 karakter',
            // 'confirmed'=> 'Password Tidak Sama',
            'same'=> ':attribute Tidak Sama',
        ],[
            'userid'=>'Username',
            'email'=>'Email',
            'password'=>'Password',
            'conf_passwd'=> 'Konfirmasi Password',
        ]);

        if ($valid->fails()) {
            $errorMessages = $valid->errors()->all();
            $errMsgHtml = implode('<br>', $errorMessages);

            return redirect()->back()
                ->withErrors($valid)
                ->withInput()
                ->with(['type'=>'error','title'=>'registrasi gagal!', 'text'=> $errMsgHtml]);
            // return dd($request->all());
            // return dd($valid->errors()->all());
        };

        $user = User::create([
            'userid'=>$request->userid,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('home')->with(['type'=>'success','title'=>'Berhasil Login','message'=>'Konfirmasi Admin Jika Baru Daftar']);
    }


    public function proslogin(Request $request)
    {
        $cred = Validator::make($request->all(), [
            'emailuser' => 'required',
            'password' => 'required|min:8'
        ], [
            'required' => 'Kolom :attribute tidak boleh kosong',
            'min' => ':attribute minimal :min Karakter'
        ],[
            'emailuser'=>'Email atau Username',
            'password'=>'Password',
        ]);

        if ($cred->fails()) {
            $pesErr = $cred->errors()->all();
            $pesanErr = implode('<br>', $pesErr);
            return redirect()->back()
                ->withErrors($cred)
                ->withInput()
                ->with(['type'=>'error','title'=>'Login Gagal!', 'text'=> $pesanErr]);
        }

        $emailOruser = [
            filter_var($request->emailuser,FILTER_VALIDATE_EMAIL)? 'email': 'userid'=>$request->emailuser,
            'password' =>$request->password,
        ];
        $ingat = $request->has('ingat') ? true : false;


        if (Auth::attempt($emailOruser,$ingat)) {
            $user = Auth::user();
            $welcomeMsg = match ($user->role) {
                'Owner' => 'Beralih ke Halaman Dashboard',
                'Dev' => 'Woy Lagi Santai Kawan!',
                'Pengawas' => 'Berhasil Login!',
                'User' => 'Berhasil Login',
                'NewComer' => 'Silahkan Hubungi Admin untuk Mengaktivasi Akun'
            };

            $pesanSelamat = match ($user->role) {
                'Owner' => 'Selamat Datang, ' . $user->userid . '!',
                'Dev' => 'Welcome, ' . $user->userid . '!',
                'Pengawas' => 'Halo, ' . $user->userid . '!',
                'User' => 'Halo, ' . $user->userid . '!',
                'NewComer' => 'Halo, ' . $user->userid . '!'
            };

            return redirect()->intended('home')
                ->with(['type' => 'success', 'title' => $pesanSelamat, 'text' => $welcomeMsg]);
        } else {
            return redirect()->back()->withInput()->with(['type'=>'error','title'=>'Login Gagal!', 'text'=>'Email atau Password Salah']);
        }
    }

    public function proslogout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->intended('/')
                ->with(['type' => 'success', 'title' => 'Logout', 'message' => 'Kamu sudah Logout']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
