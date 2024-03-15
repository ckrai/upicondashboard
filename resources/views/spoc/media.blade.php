@extends('layouts.theme')
@push('style')
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@endpush
@section('content')
<div class="content-wrapper p-2">




    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="card-title">Upload Report</h4>
                    <form action="{{ route('spoc.saveMedia') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <input type="number" value="{{$authId}}" name="added_by" hidden>

                        <div class="row">
                            @if (session('success'))
                            <span class="alert alert-success col-12">{{ session('success') }}</span>
                            @endif
                            @if (session('error'))
                            <span class="alert alert-danger col-12">{{ session('success') }}</span>
                            @endif
                            <div class="col-md-6">
                                <!-- Project Name -->
                                <label for="project_id">Project Name</label>
                                <div class="form-group">
                          
                                    <select class="form-control p-3" name="project_id" id="project_id" required onchange="getVendors(this.value)">
                                        <option selected hidden disabled>Project Name</option>
                                        @foreach($projects as $pro)
                                        <option value="{{ $pro->id }}"> {{ $pro->p_name }}</option>
                                        @endforeach
                                    </select>
                                 
                                    <div class="invalid-feedback">
                                        Please select a Project.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <!-- File Upload -->
                                <label for="upload">Upload</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="upload" name="image_files[]" accept=".jpg, .jpeg, .png, .pdf" multiple required>
                                    <div class="invalid-feedback">
                                        Please provide file .
                                    </div>
                                </div>
                            </div>
                            <input type="number" name="vass_id" id="vass_id" required value="0" hidden>
                            <input type="number" value="1" name="type" id="type" required hidden>
                            <div class=" form-group col-md-12">
                                <!-- Remark -->
                                <label for="remark">Remark</label>
                                <textarea id="remark" class="form-control" name="remark" rows="3" cols="100"></textarea>

                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">

                                <button type="submit" class="btn btn-primary rounded-pill col-6" id="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                    <!-- Display Uploaded Details -->
                    <div id="filePreviews"></div>
                    <!-- JavaScript for validation and client-side slideshow -->
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


</div>
@endsection
