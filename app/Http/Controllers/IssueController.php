<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Issue;

class IssueController extends Controller 
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
	 * Show form to create a new issue.
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create(Request $request, Project $project)
	{
		return view('issues.create', ['project' => $project]);
	}
	
	/**
	 * View the issue.
	 * @param Issue $issue
	 */
	public function view(Issue $issue)
	{
		return view('issues.view', ['issue' => $issue]);
	}
}