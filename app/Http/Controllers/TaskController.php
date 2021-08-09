<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Project;
use App\Models\Task;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function new (Request $request){
        $id = $request->route('id_project');        
        $project = Project::where('id', $id )->firstOrFail();
        return Inertia::render('Task/Create', [ "project" => $project ]);
    }

    public function edit (Request $request){   
    
        $id = $request->route('id');
        $task = Task::where('id', $id )->firstOrFail();
        $project = $task->project;
        
        return Inertia::render('Task/Update', [ "task" => $task, "project" => $project ]);
    }

    public function store (Request $request){
        $request->validate([
            'project_id' => ['required'],
            'name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'is_finished' => ['required'],
        ]);

        Task::create($request->all());
        return Redirect::route('project.show', ['id' => $request->project_id]);
    }
    public function update (Request $request){
        $request->validate([
            'name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);
        $task = Task::find($request->id);

        $task->name = $request->name; 
        $task->start_date = $request->start_date; 
        $task->end_date = $request->end_date; 
        $task->is_finished = $request->is_finished; 

        $task->save();
        return Redirect::route('project.show', ['id' => $request->project_id]);
    }
    public function delete (Request $request){
        $task = Task::find($request->id);
        $project = $task->project;
        $task->delete();
        return Redirect::route('project.show', ['id' => $project->id]);
    }
}
