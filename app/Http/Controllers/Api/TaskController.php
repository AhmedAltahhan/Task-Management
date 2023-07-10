<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskProjectRequest;
use App\Models\Tag;
use App\Models\TagTask;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::with('tags')->with('project')->latest()->paginate(10);
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskProjectRequest $request)
    {
        if($request -> get('assign') == "Assign")
        {
            $tasks=TagTask::create($request->validated());
            return response()->json($tasks);
        }
        else if($request -> get('create') == "Create")
        {
            $tasks=Task::create($request->validated());
            return response()->json($tasks);
        }
    }

    public function search(Request $request)
    {
        $tags=Tag::get();
        $search = $request->search;
        $tasks=Task::with('tags')->with('project')->where(function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->orWhereHas('project',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->orWhereHas('tags',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->latest()->paginate(10);
        return response()->json($tasks);
    }

    public function filter(Request $request)
    {
        $tags=Tag::get();
        $filter = $request->filter;
        $tasks=Task::with('tags')->with('project')->WhereHas('tags',function($query) use ($filter){
            $query->where('name',$filter);
        })->latest()->paginate(10);
        return response()->json($tasks);
    }
}
