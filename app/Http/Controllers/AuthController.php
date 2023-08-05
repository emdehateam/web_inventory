<?php

namespace App\Http\Controllers;

use App\Models\User as ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function login_view()
    {
        return view('auth/index');
    }

    public function register_view()
    {
        return view('auth/register');
    }

    public function create_register( Request $request )
    {
        // proses register/ create akun
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);

        $request->validate(
        [
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'role'      => 'required'
        ],
        [
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan, gunakan email baru',
            'name.required' => 'Nama wajib di isi',
            'username.required' => 'Username wajib di isi',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Minimum 6 karakter'
        ]
        );
        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'  => $request->role
        ];
        // var_dump($data);
        ModelUser::create($data);
        $info_register = [
            'email' => $request->email,
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password,
            'role' => $request->role
        ];

        if (Auth::attempt($info_register)) {
            # kalau auth sukses maka proses disini
            return redirect('/login');
        }else{
            // kalau auth gagal
            return redirect('/register');
        }
            
    }

    public function create_login( Request $request)
    {
        // proses login
        Session::flash('email', $request->email);
        Session::flash('username', $request->username);
        $request->validate(
            [
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email wajib di isi',
                'email.email' => 'Email tidak sesuai',
                'username.required' => 'Username wajib di isi',
                'password.required' => 'Password wajib di isi'
            ]
        );
        $info_login = [
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($info_login)) {
            switch(Auth::user()->role){
                // jika user sebagai superadmin
                case 1:
                    # kalau auth sukses maka proses disini
                    return redirect('/dashboard')->with('success', 'Berhasil Login Super admin');
                // jika user sebagai admin
                case 2:
                    # kalau auth sukses maka proses disini
                    return redirect('/admin')->with('success', 'Berhasil Login admin');
                
                // user pegawai role=3
                case 3:
                    return redirect('/pegawai')->with('success', 'Berhasil Login pegawai');

            }
                

        }else{
            // kalau auth gagal
            return redirect('/login')->withErrors('Username atau Password tidak cocok');
        }
        return view('/login');


        // var_dump($info_login);
        // if (Auth::attempt($info_login)) {
        //     # kalau auth sukses maka proses disini
        //     return redirect('/dashboard')->with('success', 'Sukses login!!');
        // }else{
        //     // kalau auth gagal
        //     return redirect('/login')->withErrors('Username tidak ditemukan');
        // }
        // return redirect('/login')->withErrors('Username tidak ditemukan');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }
}
