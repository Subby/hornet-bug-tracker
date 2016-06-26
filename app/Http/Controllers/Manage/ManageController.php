<?php
/**
 * Created by PhpStorm.
 * User: Denver
 * Date: 26/06/2016
 * Time: 16:55
 */

namespace App\Http\Controllers\Manage;


use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ManageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $projects = Project::all();
        return view('manage.home', ['projects' => $projects]);
    }

}