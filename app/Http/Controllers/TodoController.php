<?php

namespace App\Http\Controllers;

use App\Project;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $validationRules = [
        'title'         => 'required|min:3',
        'description'   => 'required|min:15'
    ];

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects/todos/create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $validated = $request->validate($this->validationRules);
        $todo = Todo::create([
            'title'         => $validated['title'],
            'description'   => $validated['description'],
            'project_id'    => $project->id,
        ]);

        return redirect('/projects/' . $project->id)->with('status', 'Todo created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Todo $todo)
    {
        return view('projects/todos/edit', [
            'project' => $project,
            'todo'    => $todo
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Todo $todo)
    {

        $validated = $request->validate($this->validationRules);
        $todo->title = $validated['title'];
        $todo->description = $validated['description'];
        $todo->save();

        $todo->complete($request->has('completed'));
        //dd($todo);
        //exit;

        return redirect('/projects/' . $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Todo $todo)
    {
        $todo->delete();

        return redirect('/projects/' . $project->id)->with('status', 'Todo deleted successfully');
    }

    public function check(Request $request, Project $project, Todo $todo) {
        $todo->complete($request->has('completed'));

        return redirect('/projects/' . $project->id);
    }
}
