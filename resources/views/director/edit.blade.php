
@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="form-group" style="margin-top: 24px;">
          <a href="{{ route('superadmin.list') }}" class="btn btn-success">Back</a>
        </div>
        @if(session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
        @endif

    <legend style="color: #38c172; font-weight: bold;">Update Form</legend>

      <form action="{{ route('superadmin.update',$bcuser->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
         <h4>Personal Details:-</h4>
         <div class="form-group row">
          <div class="col-6">
          <label for="">BC Name:</label>
          <input type="text" class="form-control" name="bc_name" id="bc_name" value="{{$bcuser->bc_name}}">
          <font style="color:red"> {{ $errors->has('bc_name') ?  $errors->first('bc_name') : '' }} </font>
        </div>
        <div class="col-4">
          <label for="">Email:</label>
          <input type="email" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="{{$bcuser->email}}">
        </div>
        <div class="col-4">
          <label for="">Phone:</label>
          <input type="text" maxlength="12" class="form-control phone" name="phone" id="phone" value="{{$bcuser->phone}}">
        </div>
        <div class="col-4">
          <label for="">Date of Birth:</label>
          <input type="date" class="form-control" name="dob" id="dob" value="{{$bcuser->dob}}">
        </div>
        <div class="col-4">
          <label for="">Zone:</label>
          <input type="text" class="form-control" name="zone" id="zone" value="{{$bcuser->zone}}">
        </div>
        <div class="col-4">
          <label for="">District:</label>
          <input type="text" class="form-control" name="district" id="district" value="{{$bcuser->district}}">
        </div>
        <div class="col-4">
          <label for="">Sub District:</label>
          <input type="text" class="form-control" name="sub_district" id="sub_district" value="{{$bcuser->sub_district}}">
        </div>
        <div class="col-4">
          <label for="">Region:</label>
          <input type="text" class="form-control" name="region" id="region" value="{{$bcuser->region}}">
        </div>
        <div class="col-4">
          <label for="">Block:</label>
          <input type="text" class="form-control" name="block" id="block" value="{{$bcuser->block}}">
        </div>
        <div class="col-4">
          <label for="">Outlet Location:</label>
          <input type="text" class="form-control" name="outlet_loc" id="outlet_loc" value="{{$bcuser->outlet_loc}}">
        </div>
        <div class="col-6">
          <label for="">Aadhaar No:</label>
          <input type="text" maxlength="14" class="form-control aadhaar" name="aadhaar" value="{{$bcuser->aadhaar}}">
        </div>
        <div class="col-6">
          <label for="">PAN No:</label>
          <input type="text" class="form-control" name="pan" value="{{$bcuser->pan}}">
        </div>
        </div>
         <h4>Full Address:-</h4>
        <div class="form-group row"> 
        <div class="col-md-4">
        <label for="address" class="form-label">Address:</label>
        <input type="text" class="form-control" name="address" id="address" value="{{$bcuser->address}}">
        </div>
        <div class="col-md-4">
          <label for="address2" class="form-label">Address 2:</label>
          <input type="text" class="form-control" name="address2" id="address2" value="{{$bcuser->address2}}">
        </div>
     
        <div class="col-md-4">
          <label for="city" class="form-label">City/Town:</label>
          <input type="text" class="form-control" id="city" name="city" value="{{$bcuser->city}}">
        </div>
        <div class="col-md-4">
          <label for="post_office" class="form-label">Post Office:</label>
          <input type="text" class="form-control" id="post_office" name="post_office" value="{{$bcuser->post_office}}">
        </div>
        <div class="col-md-4">
          <label for="pin_code" class="form-label">Pin Code:</label>
          <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{$bcuser->pin_code}}">
          </div>
        </div>
        <div class="form-group" style="margin-top: 24px;">
          <input type="submit" class="btn btn-success" value="Update">
        </div>
      </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var input = document.getElementById('phone');
    document.querySelector('.phone').addEventListener('input', function() { 
    let text=this.value                                                      
    text=text.replace(/\D/g,'')                                             
    if(text.length>3) text=text.replace(/.{3}/,'$&-')                        
    if(text.length>7) text=text.replace(/.{7}/,'$&-')                        
    this.value=text;                                                         
    });
  
</script>
<script type="text/javascript">
      document.querySelector('.aadhaar').addEventListener('input', function() { 
      let text=this.value                                                      
      text=text.replace(/\D/g,'')                                             
      if(text.length>4) text=text.replace(/.{4}/,'$&-')                        
      if(text.length>9) text=text.replace(/.{9}/,'$&-')                        
      this.value=text; 
    });
  </script>
@endsection
 