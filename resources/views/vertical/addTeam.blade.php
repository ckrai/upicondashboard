@php
$profile = ['name' => $authdata['name'], 'role' => $authdata['role']];
@endphp
@extends('layouts.theme', $profile)


@section('content')
<div class="content-wrapper p-2">

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">


          <form id="regForm" action="{{ route('vertical.saveTeam') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="number" hidden id="added_by" name="added_by" value="{{ Auth::user()->id }}">
            <div class="row">

              <div class="form-group col-md-6">
                <label for="">Team Name:</label>
                <input type="text" class="form-control" id='name' name="name" placeholder="Example...Calling, Field, Back-office">
                <!--<select class="form-control dropdown-toggle" id="name" name="name">-->
                <!--  <option selected hidden disabled>Select here</option>-->
                <!--  @foreach ($users as $user)-->
                <!--    <option value="{{ $user->name }}">{{ $user->name }}</option>-->
                <!--  @endforeach-->
                <!--</select>-->
                <font style="color:red">{{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
              </div>

              <div class="form-group col-md-6">
                <label for="">Project Name:</label>
                <select class="form-control dropdown-toggle p-3" id="pro_id" name="pro_id">
                  <option selected hidden disabled>Select here</option>
                  @foreach ($projects as $project)
                  <option value="{{ $project->id }}">{{ $project->p_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-12">
                <label for="">Description:</label>
                <textarea type="text" class="form-control" row='4' name="description" id="description" placeholder="Enter team description"></textarea>
                <font style="color:red">{{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
              </div>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center">
              <button type="submit" class="btn btn-primary rounded-pill col-6">Submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection