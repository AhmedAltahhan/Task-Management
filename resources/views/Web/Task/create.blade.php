@extends('Web.Layouts.ContentMaster')
@section('title','Add Task')
@section('content')

<div class="row">
    <div class="col-lg-8 d-flex mt-5 align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Add Task</h5>
          <div class="table-responsive">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            @endif
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Task Name:</label>
                    <input type="text" class="form-control"  name="name" id="exampleFormControlInput1" placeholder="Task Name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"> Description:</label>
                    <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="Description" required>
                </div>
                <div>
                    <label for="exampleFormControlInput1" class="form-label">Project Name:</label>
                    <select name="project_id" class="form-select form-select-sm" aria-label=".form-select-sm example"required>
                        <option selected disabled>Open this select menu</option>
                        @foreach ($projects as $project )
                            <option value="{{$project -> id}}">{{$project -> name}}</option>
                        @endforeach
                        </select>
                </div>
                <div class="text-center m-3">
                    <button type="submit" name="create" value="Create" class="btn btn-outline-primary">Create</button>
                </div>

        </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 d-flex mt-5 align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="mb-4">
            <h5 class="card-title fw-semibold">Assign Tag to Task</h5>
          </div>
          @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        @endif
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div>
                <label for="exampleFormControlInput1" class="form-label">Task Name:</label>
                <select name="task_id" class="form-select form-select-sm" aria-label=".form-select-sm example"required>
                    <option selected disabled>Open this select menu</option>
                    @foreach ($tasks as $task )
                        <option value="{{$task -> id}}">{{$task -> name}}</option>
                    @endforeach
                </select>
                <label for="exampleFormControlInput1" class="form-label">Tag Name:</label>
                <select name="tag_id" class="form-select form-select-sm" aria-label=".form-select-sm example"required>
                    <option selected disabled>Open this select menu</option>
                    @foreach ($tags as $tag )
                        <option value="{{$tag -> id}}">{{$tag -> name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center m-3">
                <button type="submit" name="assign" value="Assign" class="btn btn-outline-primary">Assign</button>
            </div>

        </form>
        </div>
      </div>
    </div>
  </div>

@endsection
