<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tag;
use App\Models\TagTask;
use App\Models\Task;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects=Project::with('user')->latest()->paginate(10);
        return view('Web.Project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::all();
        return view('Web.Project.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects=Project::findOrFail($id)->latest()->paginate(1);
        return view('Web.Project.index',compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project=Project::Where('id',$id)->get();
        return view('Web.Project.edit',compact('project','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        Project::findOrFail($id)->update($request->validated());
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::findOrFail($id)->delete();
        return redirect()->route('projects.index');
    }

    public function show_add_task()
    {
        $projects=project::all();
        $tags=Tag::all();
        $tasks=Task::all();
        return view('Web.Project.add_task',compact('projects','tags','tasks'));
    }
    public function add_task(Request $request )
    {
        if($request -> get('assign') == "Assign")
        {
            TagTask::create([
                'task_id' => $request->task_id,
                'tag_id' => $request->tag_id,
            ]);
        }
        else if($request -> get('create') == "Create")
        {
            Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'project_id' => $request->project_id,
            ]);
        }

        return redirect()->route('projects.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $projects=Project::where(function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->orWhereHas('user',function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->latest()->paginate(5);
        return view('Web.Project.index',compact('projects','search'));
    }
}
