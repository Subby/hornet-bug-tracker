<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorize('accessManagePanel');
        $this->middleware('auth');
    }

    /**
     * Show form for searching user.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('manage.users.index');
    }

    /**
     * Show all the users returned by the search.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'username' => 'required'
        ]);

        $username = $request['username'];
        $results = User::where('name', 'LIKE', '%' . $username . '%')->get();
        return view('manage.users.search', ['results' => $results]);
    }

    /**
     * Edit a user.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, User $user)
    {
        return view('manage.users.edit', ['user' => $user]);
    }

    /**
     * Update a user.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        if($request->open) {
            $user->admin = true;
        } else {
            $user->admin = false;
        }
        $user->save();
        return redirect('manage/users');
    }

    /**
     * Deletes a user.
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect('manage/users');
    }
}
