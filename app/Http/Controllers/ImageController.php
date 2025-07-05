<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;

class ImageController extends Controller
{
    public function create()
    {
        session_start();
        if (isset($_SESSION['verif'])) {
            return($_SESSION['verif'] === 'logedin'? view('upload') : redirect('/login'));
        }
        return redirect('/login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $image = $request->file('image');
        $path = $image->store('images', 'public');

        Image::create([
            'name' => $image->getClientOriginalName(),
            'path' => $path
        ]);

        return back()->with('success', 'Gambar berhasil diupload');
    }
}
