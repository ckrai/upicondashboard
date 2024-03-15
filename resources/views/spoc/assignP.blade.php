@php
$profile = ['name' => $authdata['name'], 'role' => $authdata['role']];
@endphp
@extends('layouts.theme', $profile)
@section('style')
    <style>
        .dropdown-menu {
            max-height: 300px;
            min-width: ???px;
            overflow-x: visible;
            overflow-y: scroll;
        }
        .dropdown-item:hover {
            color: blue !important;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper p-2 overflow-scroll">
        <!-- Content Header (Page header) -->



        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Assign Project</h4>
                        <form action="{{ route('spoc.saveAssign') }}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <input value="{{ $authId }}" name="added_by" hidden type="number">

                            <div class="row">
                                @if (session('success'))
                                    <span class="alert alert-success col-12">{{ session('success') }}</span>
                                @endif
                                @if (session('error'))
                                    <span class="alert alert-danger col-12">{{ session('success') }}</span>
                                @endif
                                <div class="col-md-6 form-group">
                                    <label for="p_id">Project</label>

                                    <select id="p_id" class="form-control p-3" name="p_id" required>
                                        <option selected hidden disabled>Select Project</option>
                                        @forelse ($projectData as $bcuser)
                                            <option value="{{ $bcuser['id'] }}">{{ $bcuser['name'] }}</option>
                                        @empty
                                        @endforelse

                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a project.
                                    </div>

                                </div>
                                <div class="col-md-6 form-group">
                                    <label for=" v_id">Firm/Company Name</label>

                                    <select id="v_id" class="form-control p-3" name="v_id" required>

                                        <option selected hidden disabled>Firm/Company Name</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select Firm name.
                                    </div>


                                </div>




                                <div class="col-md-4 form-group ">
                                    <label for="status">Status</label>

                                    <select id="status" class="form-control p-3" name="status" required>
                                        <option selected hidden disabled> Select Status</option>
                                        @foreach ($Status as $statuse)
                                            <option value="{{ $statuse->id }}">{{ $statuse->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select Status.
                                    </div>


                                </div>
                                <div class="form-group col-md-4">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                    <div class="invalid-feedback">
                                        Please provide start date.
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                    <div class="invalid-feedback">
                                        Please provide end date.
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="status">State</label>

                                    <select id="state" class="form-control p-3" name="state"
                                        onchange="getDistricts(this.value)" required>
                                        <option selected hidden disabled>Select State</option>
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
                                        Please select state.
                                    </div>

                                </div>
                                
                                <input type="hidden" name="district" value="" id="district">

                                <div class="dropdown col-6 mb-3">
                                    <label for="district"> Select Districts</label>

                                    <a class="btn btn-secondary dropdown-toggle col-12" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Districts
                                    </a>
                                    <ul class="dropdown-menu" id="district-list" data-bs-spy="scroll"
                                        data-bs-target="#simple-list-example" data-bs-offset="0"
                                        data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                                    </ul>
                                    <div class="invalid-feedback">
                                        Please select District.
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="address">Remark</label>
                                    <div class="form-group">
                                        <textarea id="remark" class="form-control" name="remark" rows="3" cols="100">
                                   </textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary rounded-pill col-6"
                                        id="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const district = document.getElementById('district');
            const districtList = document.getElementById('district-list');
            async function getDistricts(state) {
                districtList.innerHTML = "<li>Loading...</li>";
                try {
                    const response = await fetch(`https://vcredil.com/get-district.php?state=${state}`);
                    if (response.ok) {
                        const data = await response.json();
                        let temp = '';
                        data.forEach(element => {
                            temp += `<li class="dropdown-item">
                                <div class="form-check px-2">
                        <input class="form-check-input" type="checkbox" value="${element}" id="" onchange="addDistrict(this)" />
                        <label class="form-check-label" for="">${element}</label>
                    </div>
                                        </li>`;
                        });

                        districtList.innerHTML = temp;
                    } else {
                        console.error('Failed to fetch data.');
                        districtList.innerHTML = "<li>Failed to fetch districts</li>";
                    }
                } catch (error) {
                    console.error('An error occurred:', error);
                    districtList.innerHTML = "<li>An error occurred</li>";
                }
            }

            function addDistrict(checkbox) {
                const value = checkbox.value;
                let temp = district.value.split(',');
                if (checkbox.checked) {
                    if (!temp.includes(value)) {
                        temp.push(value);
                    }
                } else {
                    temp = temp.filter(item => item !== value);
                }
                district.value = temp.join(',');
            }

            function toggleStyle(element) {
                // Check if the element has the class 'bg-primary'
                if (element.classList.contains('bg-primary')) {
                    // Remove 'bg-primary' and add 'bg-light'
                    element.classList.remove('bg-primary');
                    element.classList.add('bg-light');
                } else {
                    // Remove 'bg-light' and add 'bg-primary'
                    element.classList.remove('bg-light');
                    element.classList.add('bg-primary');
                }
            }
        </script>
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
