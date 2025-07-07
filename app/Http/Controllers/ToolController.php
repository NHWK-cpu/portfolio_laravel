<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function form() {
        session_start();
        if (isset($_SESSION['verif'])) {
            return($_SESSION['verif'] === 'logedin'? view('toolsmanage') : redirect('/login'));
        }
        return redirect('/login');
    }

    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'name' => 'required|max:100',
        ]);

        $image = $request->file('image');
        $path = $image->store('images/tools', 'public');

        Tool::create([
            'name' => $request->input('name'),
            'image' => $path,
        ]);

        return back()->with('success', 'Data berhasil diupload');
    }

    public function destroy($id) {

        session_start();
        if ((!isset($_SESSION['verif']) || $_SESSION['verif'] !== 'logedin')) {
            return redirect('/login');
        }

        $tool = Tool::find((int)$id);

        if(!$tool) return back();

        unlink(public_path('storage/'. $tool->image));
        Tool::destroy($id);
        return back()->with('success','Data berhasil dihapus');

    }

    public function showedit($id)
    {
        session_start();
        if (!isset($_SESSION['verif']) || $_SESSION['verif'] !== 'logedin') {
            return redirect('/login');
        }

        if (!Tool::find((int) $id)) {
            return back();
        }

        return view('tooledit', Tool::find((int) $id));
    }

    public function updateimage($req, $tool)
    {
        $path = $req->file('image')->store('images/tools', 'public');
        if ($path != null) {
            unlink(public_path('storage/' . $tool->image));
            return $path;
        } else {
            return $tool->image;
        }
    }

    public function edit(Request $request)
    {
        $tools = Tool::find($request->input('id'));
        $tools->name = $request->input('name') ?? $tools->name;
        $tools->image = static::updateimage($request, $tools);
        $tools->save();

        return redirect('/tools')->with('success', 'Data berhasil diubah');
    }
}
