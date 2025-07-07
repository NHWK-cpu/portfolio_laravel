<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showlogin() {
        session_start();
        if (isset($_SESSION['verif'])) {
            return($_SESSION['verif'] === 'logedin'? redirect('/') : redirect('/login'));
        }
        return view('login');
    }

    public function logout() {
        session_start();
        session_destroy();
        return redirect('/');
    }

    public function confirm(Request $request) {
        $request->validate([
            'password' => 'required',
        ]);

        if ($request->password === env('LOGIN_PASSWORD')) {
            session(['verif' => 'logedin']);
            session_start();
            $_SESSION['verif'] = 'logedin';
            return redirect('/');
        } else {
            return redirect('/login')->with(
                'error', 'Password salah!',
            );
        }
    }
}
