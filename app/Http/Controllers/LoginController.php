<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showlogin() {
        session_start();
        if (isset($_SESSION['verif'])) {
            return($_SESSION['verif'] === 'logedin'? view('upload') : redirect('/login'));
        }
        return view('login');
    }

    public function logout() {
        session_start();
        session_destroy();
        return redirect('/login');
    }

    public function confirm(Request $request) {
        $request->validate([
            'password' => 'required',
        ]);

        if ($request->password === env('LOGIN_PASSWORD')) {
            session_start();
            $_SESSION['verif'] = 'logedin';
            return redirect('/upload');
        } else {
            return redirect('/login')->with(
                'error', 'Password salah!',
            );
        }
    }
}
