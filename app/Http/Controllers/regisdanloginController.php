<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class regisdanloginController extends Controller
{
    public function prosdaftar(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'userid' => ['required', 'max:12', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{1,12}$/'],
            // 'userid' => 'required|max:12',
            'name' => 'required|max:80',
            'email' => 'required|email|unique:users|ends_with:gmail.com,mailnator.com',
            'password' => 'required|min:8',
        ], [
            'required' => 'Kolom :attribute Wajib Diisi',
            'email' => 'Format Email Salah',
            'unique' => 'Email sudah terdaftar',
            'min' => ':attribute minimal :value karakter',
            'max' => ':attribute maksimal :value karakter',
            'ends_with' => 'Tolong Gunakan email Google',
            'regex' => 'Kolom :attribute harus berisi huruf besar, huruf kecil, dan angka maksimal 12 karakter',
        ]);

        if ($valid->fails()) {
            $errorMessages = $valid->errors()->all();
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
            // ->with('error','Validasi Gagal');
        }

        try {
            $userBaru = User::create([
                'userid' => $request->userid,
                'name' => $request->name,
                'password' => $request->password,
            ]);
            $request->session()->regenerate();
            Auth::login($userBaru);
            $pesan = 'User Baru Silahkan Lapor Ke Atasan untuk Pengaktifan Akun';
            $pesanTitle = 'Halo, ' . $userBaru->name . '!';
            return redirect()->intended('home')
                ->with(['type' => 'success', 'title' => $pesanTitle, 'message' => $pesan]);
        } catch (\Exception $e) {
            return response()->json([
                'type' => 'error',
                'title' => 'Error',
                'text' => $e->getMessage()
            ]);
        }
    }


    public function proslogin(Request $request)
    {
        $cred = Validator::make($request->all(), [
            'userid' => 'required',
            'password' => 'required|min:8'
        ], [
            'required' => 'Kolom :attribute harus di isi',
            'min' => ':attribute minimal :min Karekter'
        ]);

        if ($cred->fails()) {
            return redirect()->back()
                ->withErrors($cred)
                ->withInput();
        }

        $cek = $request->only('userid', 'password');
        $ingat = $request->has('ingat') ? true : false;


        // if(Auth::attempt($cek,$ingat)){

        if (Auth::attempt($cek)) {
            $user = Auth::user();
            $welcomeMsg = match ($user->role) {
                'Owner' => 'Beralih ke Halaman Dashboard',
                'Dev' => 'Woy Lagi Santai Kawan!',
                'Pengawas' => 'Berhasil Login!',
                'User' => 'Berhasil Login',
                'NewComer' => 'Silahkan Hubungi Atasan untuk Mengaktivasi Akun'
            };

            $pesanSelamat = match ($user->role) {
                'Owner' => 'Selamat Datang, ' . $user->name . '!',
                'Dev' => 'Welcome, ' . $user->name . '!',
                'Pengawas' => 'Halo, ' . $user->name . '!',
                'User' => 'Halo, ' . $user->name . '!',
                'NewComer' => 'Halo, ' . $user->name . '!'
            };

            return redirect()->intended('home')
                ->with(['type' => 'success', 'title' => $welcomeMsg, 'text' => $pesanSelamat]);
        } else {
            return redirect()->back()->with('error', 'username dan password tidak ditemukan');
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
