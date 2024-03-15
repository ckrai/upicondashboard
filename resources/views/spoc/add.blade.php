@php
$profile = ['name' => $authdata['name'], 'role' => $authdata['role']];
@endphp
@extends('layouts.theme', $profile)

@section('style')
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@endsection

@section('content')
<div class="content-wrapper p-2">



    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Register Firm/Company</h4>
                    <form action="{{ route('spoc.save') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <input value="{{ $authId }}" name="added_by" hidden type="number">
                        <div class="row">
                            @if (session('success'))
                            <span class="alert alert-success col-12">{{ session('success') }}</span>
                            @endif
                            @if (session('error'))
                            <span class="alert alert-danger col-12">{{ session('success') }}</span>
                            @endif

                            <div class="form-group col-12">
                                <label for="vendor_name">Firm/Company Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Firm/Company Name" required >
                                <div class="invalid-feedback">
                                    Please provide a  Firm Name.
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
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Target Email" required>
                                <div class="invalid-feedback">
                                    Please provide Email.
                                </div>
                            </div>
                            <div class=" form-group col-md-6">
                                <label for="status">State</label>
                                <select id="state" class="form-control p-3" name="state" onchange="getDistricts(this.value)" required>
                                    <option value="">Select State</option>
                                    <option value="Andaman Nicobar">Andaman Nicobar</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra Nagar Haveli and Daman a">Dadra Nagar Haveli and Daman a
                                    </option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu Kashmir">Jammu Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Ladakh">Ladakh</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide state.
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="district">District</label>
                                <select class="form-control p-3" name="district" disabled id="district">
                                    <option value="">Select District</option>
                                    <!-- <option>Lucknow</option> -->
                                </select>
                                <div class="invalid-feedback">
                                    Please provide District.
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Target address" required>
                                <div class="invalid-feedback">
                                    Please provide Address.
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="remark">Remark</label>
                                <input type="text" class="form-control" id="remark" name="remark" placeholder="Enter Remarks">
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
        const district = document.getElementById('district');
        async function getDistricts(state) {
            district.disabled = false;
            district.innerHTML = "<option value=''>Loading...</option>";
            try {
                const response = await fetch(`https://vcredil.com/get-district.php?state=${state}`);
                if (response.ok) {
                    const data = await response.json();
                    let temp = "<option value=''>Select District</option>";
                    data.forEach(element => {
                        temp += `<option value="${element}">${element}</option>`;
                    });
                    district.innerHTML = temp;
                } else {
                    console.error('Failed to fetch data.');
                    district.innerHTML = "<option value=''>Failed to fetch districts</option>";
                }
            } catch (error) {
                console.error('An error occurred:', error);
                district.innerHTML = "<option value=''>An error occurred</option>";
            }
        }
    </script>
    <script>
        // Enable Bootstrap validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName(
                    'needs-validation'); // Loop over them and prevent submission
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
</div>
@endsection