@php
$profile = ['name' => $authdata['name'], 'role' => $authdata['role']];
@endphp
@extends('layouts.theme', $profile)

@section('content')


<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Project</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- <div class="card-header">
                      <h3 class="card-title">DataTable</h3>
                    </div> -->
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <h5 class="mb-3">Project Details</h5>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold"><b>Name</b></td>
                                            <td>{{ $data['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold"><b>Vertical</b></td>
                                            <td>{{ $data['vertical'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold"><b>Head</b></td>
                                            <td>{{ $data['head'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold"><b>Details</b></td>
                                            <td>{{ $data['details'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="example2">
                                        <h5 class="mb-3">Team Details</h5>
                                        <thead class="bg-secondary text-light">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $serialNumber = 1;
                                            @endphp
                                            @foreach ($data['teams'] as $team)
                                            <tr>
                                                <td>{{ $serialNumber }}</td>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->description }}</td>
                                                <td>{{ $team->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td><a href="#" class="btn btn-sm btn-outline-primary ">View</td>
                                            </tr>
                                            @php
                                            $serialNumber++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="example3">
                                        <h5 class="mb-3">Vendor Details</h5>
                                        <thead class="bg-secondary text-light">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Vendor Name</th>
                                                <th>State</th>
                                                <th>District</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $serialNumber = 1;
                                            @endphp
                                            @foreach ($data['vendors'] as $vendor)
                                            <tr>
                                                <td>{{ $serialNumber }}</td>
                                                <td>{{ $vendor['name'] }}</td>
                                                <td>{{ $vendor['state'] }}</td>
                                                <td>{{ $vendor['district'] }}</td>
                                                <td>{{ $vendor['start_date'] }}</td>
                                                <td>{{ $vendor['end_date'] }}</td>
                                                <td>{{ $vendor['status'] }}</td>
                                                <td><a href="/vertical/vendor/{{ $vendor['id'] }}" class="btn btn-sm btn-outline-primary ">View</td>
                                            </tr>
                                            @php
                                            $serialNumber++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>



</body>
@endsection