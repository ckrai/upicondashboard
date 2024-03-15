@php
$profile = ['name' => $authdata['name'], 'role' => $authdata['role']];
@endphp
@extends('layouts.theme', $profile)
@push('style')

<script src="{{ asset('js/app.js') }}" type="text/js"></script>

@endpush
@section('content')
<div class="content-wrapper p-2">

    <!-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Vendor Registration</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('spoc.index') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('spoc.index') }}">Back</a></li>
                    </ol>
                </div>
            </div>>
        </div>
    </div> -->


    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vendor Registration</h4>
                    <form action="{{ route('spoc.saveVendor') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <input value="{{$authIds}}" name="added_by" hidden type="number">
                        <div class="row">
                            @if (session('success'))
                            <span class="alert alert-success col-12">{{ session('success') }}</span>
                            @endif
                            @if (session('error'))
                            <span class="alert alert-danger col-12">{{ session('success') }}</span>
                            @endif

                            <div class="col-md-6 form-group">
                                <label for="p_id">Project</label>
                                <select id="p_id" class="form-control p-3" name="p_id" required onchange="getVendors(this.value)">
                                    <option selected hidden disabled>Select Project</option>
                                    @forelse ($projectData as $bcuser)
                                    <option value="{{ $bcuser['id'] }}">{{ $bcuser['name'] }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <div class="invalid-feedback">
                                    Please provide project.
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="district">Vendor Name</label>
                                <select class="form-control p-3" name="v_id" id="v_id">
                                    <option selected hidden disabled>Vendor Name</option>
                                    <option value="#"></option>>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide Vendor.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="vender_name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter  Name" required pattern="[A-Za-z\s]{2,}">
                                <div class="invalid-feedback">
                                    Please provide a valid name (at least 2 characters, alphabets only).
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" required pattern="[0-9]{10}">
                                <div class="invalid-feedback">
                                    Please provide a 10-digit Mobile number.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter  Email" required>
                                <div class="invalid-feedback">
                                    Please provide Email.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                <div class="invalid-feedback">
                                    Please provide Email.
                                </div>
                            </div>

                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <button type="submit" class="btn btn-primary rounded-pill col-6" id="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>





    <script>
        // Enable Bootstrap validation
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        const vendor = document.getElementById('v_id');
        async function getVendors(project) {
            const response = await fetch(`/api/projectVendors/${project}`);
            const data = await response.json();
            let temp = '<option selected hidden disabled>Select Vendor</option>';
            if (data.length > 0) {
                data.forEach(vendor => {
                    temp += `<option value=${vendor.id}>${vendor.name}</option>`;
                });
                vendor.innerHTML = temp;
            } else {
                vendor.innerHTML = '<option selected hidden disabled>No Vendor Found</option>';
            }

        }
    </script>

</div>
@endsection