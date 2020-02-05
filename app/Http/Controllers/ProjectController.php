<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Validation
     */
    protected $validationRules = [

             'title'        => 'required|min:3',
             'description'  => 'required|min:5',

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::where('user_id', Auth::user()->id)->get();
        $projects = Auth::user()->projects;
            //dump($projects);//ett sätt att visa project
        return view('projects/index', [
            'projects'  => $projects
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validData = $request->validate($this->validationRules);

        $project = New Project();
        $project->user_id = Auth::user()->id;
        $project->title = $validData['title'];
        $project->description = $validData['description'];
        $project->save();
        return redirect('/projects/' . $project->id)->with('status', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //parameter som ersätter raden nedan (RessourceController)
            //$project = Project::findOrFail($id);
            $todos = $project->todos;
            return view('projects/show', [
                'project'   => $project,
                'todos'     => $todos
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects/edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validData = $request->validate($this->validationRules);

        $project->title = $validData['title'];
        $project->description = $validData['description'];
        $project->save();

        return redirect("/projects/" . $project->id)->with('status', 'Project edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //dd("Delete me"); //för att testa
        $project->delete();

        return redirect("/projects")->with('status', 'Project deleted successfully');

    }
}
