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

        public function show(Project $project){//parameter som ersätter raden nedan (RessourceController)
            //$project = Project::findOrFail($id);
            $todos = $project->todos;
            return view('projects/show', [
                'project'   => $project,
                'todos'     => $todos
            ]);
        }
}
