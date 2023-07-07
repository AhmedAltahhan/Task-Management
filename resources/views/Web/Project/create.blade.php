@extends('Web.Layouts.ContentMaster')
@section('title','Create')
@section('content')

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Create Project</h5>
                </div>

            </div>
            <div>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                @endif
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Project Name:</label>
                        <input type="text" class="form-control"  name="name" id="exampleFormControlInput1" placeholder="Project Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> Description:</label>
                        <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="Description">
                    </div>


                <div>
                    <label for="exampleFormControlInput1" class="form-label"> User ID:</label>
                    <select name="user_id" class="form-select form-select-sm" aria-label=".form-select-sm example"required>
                        <option selected disabled>Open this select menu</option>
                        @foreach ($user as $id )
                            <option value="{{$id -> id}}">{{$id -> id}}</option>
                        @endforeach
                        </select>
                </div>
                <div class="text-center m-3">
                    <button type="submit" class="btn btn-outline-primary">Create</button>
                </div>

            </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection

