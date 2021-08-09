<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProjectController;

use Illuminate\Http\Request;

use App\Models\Project;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(4);
        foreach( $projects as $project){
            $field = ProjectController::fetch( $project->id );            
            $project->start_date_br = $field->start_date_br;
            $project->end_date_br = $field->end_date_br;
            $project->diff = $field->diff;
        }
        return Inertia::render('Dashboard', ['projects' => $projects]);
    }
}
