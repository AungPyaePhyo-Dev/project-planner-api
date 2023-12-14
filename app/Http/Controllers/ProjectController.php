<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $projects =  Project::get();
       return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $project = Project::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'complete' => $request->complete
        ]);

        return response()->json([
            'message' => "successfully stored a project",
            'status' => 200,
            'project' => $project
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::where('id', $id)->first();
        return response()->json([
            'message' => 'Project Detail',
            'status' => 200,
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::where('id', $id)->update($request->all());

        return response()->json([
            'message' => 'successfully updated project',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::where('id', $id)->delete();

        if($project) {
            return response()->json([
                'message' => 'successfully deleted project',
                'status' => 200
            ]);
        }else {
            return response()->json([
                'message' => 'Project not found',
                'status' => 404
            ], 404);
        }
    }
}
