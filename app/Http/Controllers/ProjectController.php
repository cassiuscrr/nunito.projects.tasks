<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Project;
use Inertia\Inertia;

use Carbon\Carbon;

class ProjectController extends Controller
{
    public function index (){
        $projects = Project::orderBy('id', 'desc')->paginate(3);
        foreach( $projects as $project){
            $field = $this->fetch( $project->id );            
            $project->start_date_br = $field->start_date_br;
            $project->end_date_br = $field->end_date_br;
            $project->diff = $field->diff;
            $project->tasks_all = $field->tasks_all;
            $project->tasks_finished = $field->tasks_finished;
            $project->state = $field->state;
        }
        return Inertia::render('Project/Index', ["projects" => $projects]);
    }

    public function new (){
        return Inertia::render('Project/Create');
    }

    public function edit (Request $request){
        $id = $request->route('id');         
        $project = $this->fetch( $id ) ;
        return Inertia::render('Project/Update', ["project" => $project]);
    }

    public function show (Request $request){
        $id = $request->route('id');         
        $project = $this->fetch( $id ) ;
        $tasks = $project->tasks()->paginate(10);
        return Inertia::render('Project/Show', ["project" => $project, "tasks" => $tasks]);
    }

    public function store (Request $request){
        $request->validate([
            'name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $id = Project::create($request->all())->id;
        return Redirect::route('project.show', ['id' => $id]);
    }

    public function update (Request $request){
        $request->validate([
            'name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);
        $project = Project::find($request->id);

        $project->name = $request->name; 
        $project->start_date = $request->start_date; 
        $project->end_date = $request->end_date; 

        $project->save();
        return Redirect::route('project.show', ['id' => $request->id]);
    }
    public function delete (Request $request){
        $project = Project::find($request->id);
        $project->delete();
        return Redirect::route('project.index');
    }

    static function fetch( $id ){
        $project = Project::where('id', $id )->firstOrFail();         
        $start = Carbon::createFromFormat('Y-m-d', $project->start_date);
        $project->start_date_br = $start->format('d/m/Y');        
        $end = Carbon::createFromFormat('Y-m-d', $project->end_date);
        $project->end_date_br = $end->format('d/m/Y');
        $project->tasks_all = $project->tasks()->count();
        $project->tasks_finished = $project->tasks()->where('is_finished', true)->count();
        $project->diff = null;
        $project->state = 'Criado';
        if( $project->tasks_all > 0 ){
            $project->state = 'Em andamento';

            $last_task = $project->tasks()->where('is_finished', false)->orderBy('end_date', 'desc')->first();
            if($last_task){
                $last_task = Carbon::createFromFormat('Y-m-d', $last_task->end_date);
                $project->diff = $diff = $end->diffInDays( $last_task, false );
                if( $diff > 0 ){
                    $project->state = 'Em atraso';
                }
            }
        }
        return $project;
    }
}
