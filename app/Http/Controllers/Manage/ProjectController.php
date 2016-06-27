<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $projects = Project::all();
        return view('manage.projects.index', ['projects' => $projects]);
    }

    public function create(Request $request)
    {
        return view('manage.projects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:12',
            'description' => 'required'
        ]);

        $request->user()->projects()->create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/manage/projects');
    }

    public function destroy(Request $request, Project $project)
    {
        $project->delete();
        return redirect('/manage/projects');
    }
}
