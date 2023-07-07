@extends('Web.Layouts.ContentMaster')
@section('title' , 'Update')
@section('content')

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
              <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Update Project</h5>
              </div>

            </div>
            <div>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                @endif
                <form action="{{ route('projects.update' , ['project' => $id ]) }}" method="Post">
                    @csrf
                    @method('Put')
                    @foreach ($project as $p)
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Project Name:</label>
                        <input type="text" class="form-control"  name="name" value="{{$p -> name}}" id="exampleFormControlInput1" placeholder="Project Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> Description:</label>
                        <input type="text" class="form-control" name="description" value="{{$p -> description}}" id="exampleFormControlInput1" placeholder="Description">
                    </div>
                    @endforeach
                    <div class="text-center m-3">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
