<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function form()
    {
        session_start();
        if (isset($_SESSION['verif'])) {
            return $_SESSION['verif'] === 'logedin' ? view('projectmanage') : redirect('/login');
        }
        return redirect('/login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'name' => 'required|max:100',
            'desc' => 'required|max:255',
        ]);

        $image = $request->file('image');
        $path = $image->store('images/project', 'public');

        Project::create([
            'name' => $request->input('name'),
            'image' => $path,
            'desc' => $request->input('desc'),
            'github' => $request->input('github'),
            'release' => $request->input('release'),
        ]);

        return back()->with('success', 'Data berhasil diupload');
    }

    public function destroy($id)
    {
        session_start();
        if (!isset($_SESSION['verif']) || $_SESSION['verif'] !== 'logedin') {
            return redirect('/login');
        }

        $proj = Project::find((int) $id);

        if (!$proj) {
            return back();
        }

        unlink(public_path('storage/' . $proj->image));
        Project::destroy($id);
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function showedit($id)
    {
        session_start();
        if (!isset($_SESSION['verif']) || $_SESSION['verif'] !== 'logedin') {
            return redirect('/login');
        }

        if (!Project::find((int) $id)) {
            return back();
        }

        return view('projectedit', Project::find((int) $id));
    }

    public function updateimage($req, $proj)
    {
        $path = $req->file('image')->store('images/project', 'public');
        if ($path != null) {
            unlink(public_path('storage/' . $proj->image));
            return $path;
        } else {
            return $proj->image;
        }
    }

    public function edit(Request $request)
    {
        $project = Project::find($request->input('id'));
        $project->name = $request->input('name') ?? $project->name;
        $project->image = static::updateimage($request, $project);
        $project->desc = $request->input('desc') ?? $project->desc;
        $project->github = $request->input('github') ?? $project->github;
        $project->release = $request->input('release') ?? $project->release;
        $project->save();

        return redirect('/project')->with('success', 'Data berhasil diubah');
    }
}
