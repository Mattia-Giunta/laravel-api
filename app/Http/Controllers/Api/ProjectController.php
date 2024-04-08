<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){


        $projects = Project::with('type', 'technologies')->paginate(3) ;

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show( $slug ){
        $projects = Project::with('type', 'technologies')->where('slug', $slug )->first();

        if ( $projects ) {
            return response()->json([
                'success' => true,
                'projects' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => "Non c'è il post che hai cercato"
            ]);
        }
    }
}
