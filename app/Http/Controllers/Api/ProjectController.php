<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('user')->latest()->paginate(request()->page_size);
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project=Project::create($request->validated());
        return response()->json($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project=Project::with('user')->findOrFail($id);
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $project=Project::findOrFail($id)->update($request->validated());
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project=Project::findOrFail($id)->delete();
        return response()->json($project);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $projects=Project::with('user')->where(function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->orWhereHas('user',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->latest()->paginate(5);

        return response()->json($projects);
    }

}
