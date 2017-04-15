<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Issue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

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

	/**
	 * Store newly created issue.
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request, Project $project)
	{	
		$this->validate($request, [
				'title' => 'required',
				'description' => 'required'
		]);
		
		$issue = new Issue();
		$issue->title = $request->title;
		$issue->comment = $request->description;
		$issue->project_id = $project->id;
		$issue->user_id = $request->user()->id;
		$issue->save();
	
		return redirect('/issue/'.$issue->id);
	}
	
	/**
	 * Edit an existing issue.
	 * @param Request $request
	 * @param unknown $id
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|unknown
	 */
	public function edit(Request $request, $id)
	{
		$issue = Issue::findOrFail($id);
		if ((Auth::user()->admin) || ($issue->user_id == Auth::user()->id)) {
			return view('issues.edit', ['issue' => $issue]);
		}	
		
		return response('Forbidden', 403);
	}
	
	/**
	 * Update an existing issue.
	 * @param Request $request
	 * @param Issue $issue
	 */
	public function update(Request $request, Issue $issue)
	{
		if ((Auth::user()->admin) || ($issue->user_id == Auth::user()->id)) {
			$this->validate($request, [
					'title' => 'required',
					'description' => 'required'
			]);
			$issue->title = $request->title;
			$issue->comment = $request->description;
			$issue->open = isset($request->open);
			$issue->save();
			
			return redirect('/issue/'.$issue->id);
		}
		return response('Forbidden', 403);
	}
}