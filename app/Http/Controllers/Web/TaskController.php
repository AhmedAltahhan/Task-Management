<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskProjectRequest;
use App\Models\Project;
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
        $tasks=Task::With('tags')->with('project')->latest()->paginate(10);
        $tags=Tag::get();
        return view('Web.Task.index',compact('tasks','tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects=Project::all();
        $tags=Tag::all();
        $tasks=Task::all();
        return view('Web.Task.create',compact('projects','tags','tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskProjectRequest $request)
    {
        if($request -> get('assign') == "Assign")
        {
            TagTask::create($request->validated());
        }
        else if($request -> get('create') == "Create")
        {
            Task::create($request->validated());
        }

        return redirect()->route('tasks.index');
    }

    public function search(Request $request)
    {
        $tags=Tag::get();
        $search = $request->search;
        $tasks=Task::where(function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->orWhereHas('project',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->orWhereHas('tags',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->latest()->paginate(10);
        return view('Web.Task.index',compact('tasks','search','tags'));
    }

    public function filter(Request $request)
    {
        $tags=Tag::get();
        $filter = $request->filter;
        $tasks=Task::WhereHas('tags',function($query) use ($filter){
            $query->where('name',$filter);
        })->latest()->paginate(10);
        return view('Web.Task.index',compact('tasks','filter','tags'));
    }
}
