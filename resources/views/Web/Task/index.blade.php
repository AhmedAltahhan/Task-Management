@extends('Web.Layouts.ContentMaster')
@section('title','Tasks')

@section('filter')
    <form action="tag" method="GET">
        <div class="input-group">
            <select name="filter" class="form-select form-select-sm" required>
                <option selected disabled>All Tags</option>
                @foreach ($tags as $tag )
                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="form-control-sm  bg-info ">Filter</button>
        </div>
    </form>
@endsection

@section('search')

    <form action="/task" method="get">
        <input type="search" class="form-control" placeholder="Search.." name="search">
        <button type="submit" class="form-control badge bg-info rounded-5">Search</button>
    </form>

@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
      <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Tasks</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Id</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Name</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Description</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Tags</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Project</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$task->id}}</h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$task->name}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{$task->description}}</p>
                                </td>
                                <td class="border-bottom-0">
                                    @foreach ($task->tags as $tag)

                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-primary rounded-3 fw-semibold">{{$tag->name}}</span>
                                        </div>

                                    @endforeach
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{$task->project->name}}</p>
                                </td>
                            </tr>
                        @endforeach
                  </tr>
                </tbody>
              </table>
              <div class="d-flex">
                {!! $tasks->links() !!}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-6 px-6 text-center">
      <p class="mb-0 fs-4">Design and Developed by Ahmed </p>
    </div>
</div>

@endsection
