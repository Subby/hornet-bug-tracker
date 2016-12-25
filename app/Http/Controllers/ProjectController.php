<?php
namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller 
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * View a project, displaying the issues.
	 */
	public function view(Project $project) 
	{
		$issues = Project::find($project->id)->issues;
		return view('projects.view', ['project' => $project, 'issues' => $issues]);
	}
}