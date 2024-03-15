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


                    <form id="regForm" action="{{ route('vertical.saveMember') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="number" hidden id="added_by" name="added_by" value="{{ Auth::user()->id }}">
                        <input type="number" hidden id="role" name="role" value="{{ Auth::user()->role }}">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="">Team:</label>
                                <!--<input type="text" class="form-control" id='t_id' name="t_id" placeholder="Example"> -->
                                <select class="form-control dropdown-toggle p-3" id="t_id" name="t_id" type='number'>
                                    <option selected hidden disabled>Select Team</option>
                                    @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red">{{ $errors->has('t_id') ? $errors->first('t_id') : '' }}
                                </font>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Team Member:</label>

                                <select class="form-control dropdown-toggle p-3" id="user_id" name="user_id" type='number'>
                                    <option selected hidden disabled>Select Team</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red">{{ $errors->has('user_id') ? $errors->first('user_id') : '' }}
                                </font>
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