<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
class ProjectController extends Controller
{

    /**
     * Show an index of all
     */
    public function index(){
        $projects = Project::all();

        return view('projects/index', [
            'projects'  => $projects
            ]);
        }

        public function show($id){
            $project = Project::findOrFail($id);

            return view('projects/show', [
                'project'   => $project
            ]);
        }
}
