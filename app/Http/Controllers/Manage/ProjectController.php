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
        $this->authorize('accessManagePanel');
        $this->middleware('auth');
    }

    /**
     * Show all the current projects.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projects = Project::all();
        return view('manage.projects.index', ['projects' => $projects]);
    }

    /**
     * Show form to create a new project.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('manage.projects.create');
    }

    /**
     * Store newly created form.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Delete a project.
     * @param Request $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Request $request, Project $project)
    {
        $project->delete();
        return redirect('/manage/projects');
    }

    /**
     * Edit a existing project.
     * @param Request $request
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Project $project)
    {
        return view('manage.projects.edit', ['project' => $project]);
    }

    /**
     * Update a existing project.
     * @param Request $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'name' => 'required|max:12',
            'description' => 'required',
            'open' => 'required'
        ]);

        $project->name = $request->name;
        $project->description = $request->description;
        if(isset($request->open)) {
            $project->open = true;
        } else {
            $project->open = false;
        }
        $project->save();
        return redirect('/manage/projects');
    }
}
