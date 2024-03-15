@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="3.3.6/css/bootstrap.min.css">
<!-- <link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet" />-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
@endpush
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Add Team</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
  </div>
  <section class="content">
    <div class="container-fluid">   
    <div class="col-md-10">
      <body>
      <form id="regForm" action="{{ route('admin.saveTeam') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <div class="col-3">
            <label for="">Project Name:</label>
            <input type="text" style="display: none;" id="added_by" name="added_by" value="{{ Auth::user()->id }}">
            <!-- <input type="integer" class="form-control" id='pro_id' name="pro_id" placeholder="Enter pro_id"> -->
            <select class="form-control dropdown-toggle" id="n_spoc" name="n_spoc">
              <option selected hidden disabled>Select here</option>
              @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->p_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-3">
            <label for="">Team Member Name:</label>
            <!-- <input type="text" class="form-control" id='name' name="name" placeholder="Enter name"> -->
            <select class="form-control dropdown-toggle" id="n_spoc" name="n_spoc">
              <option selected hidden disabled>Select here</option>
              @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
            <font style="color:red">{{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
          </div>
          
          <div class="col-4">
            <label for="">Description:</label>
            <textarea type="text" class="form-control" row='4' name="description" id="description" placeholder="Enter description"></textarea>
            <font style="color:red">{{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
          </div>
        </div>
        <div style="float:right;">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      </body>
    </div> 
    </div>
  </section>
</div>
@endsection