@extends('Web.Layouts.ContentMaster')
@section('title','project')

@section('search')

    <form action="/project" method="get">
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
            <h5 class="card-title fw-semibold mb-4">projects</h5>
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
                      <h6 class="fw-semibold mb-0">User Name</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Action</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$project->id}}</h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$project->name}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{$project->description}}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-primary rounded-3 fw-semibold">{{$project->user->name}}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <form action="{{ route('projects.show', [$project->id]) }}" method="GET">
                                        @csrf
                                        <button class="badge bg-info rounded-5" type="submit">Show</button>
                                    </form>
                                    <form action="{{ route('projects.edit', [$project->id]) }}" method="GET">
                                        @csrf
                                        <button class="badge bg-success rounded-5" type="submit">Update</button>
                                    </form>
                                    <form action="{{ route('projects.destroy', [$project->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="badge bg-danger rounded-5" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                  </tr>
                </tbody>
              </table>
              <div class="d-flex">
                {!! $projects->links() !!}
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
