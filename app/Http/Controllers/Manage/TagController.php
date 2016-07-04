<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all the current tags.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tags = Tag::all();
        return view('manage.tags.index', ['tags' => $tags]);
    }

    /**
     * Show form to create a new project.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('manage.tags.create');
    }

    /**
     * Store newly created tag.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:12',
            'colour' => 'required'
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->colour = $request->colour;
        $tag->save();

        return redirect('/manage/tags');
    }
}
