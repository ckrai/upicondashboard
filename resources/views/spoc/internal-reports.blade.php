@php
    $profile = ['name' => $authdata['name'], 'role' => $authdata['role']];
@endphp
@extends('layouts.theme', $profile)


@section('content')
    </style>

    <body class="hold-transition sidebar-mini">
        <div class="content-wrapper">
            <!-- /.content-header -->
            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row ">


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body ">
                                    <h4 class="card-title">{{ $data['name'] }} </h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="example3">
                                            <thead class="bg-secondary text-light">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>file Name</th>
                                                    <th>Project Name</th>
                                                    <!-- <th>Vendor Name</th> -->
                                                    <th>State </th>
                                                    <th>District </th>
                                                    <th>Upload Date</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data['media'] as $project)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $project['mediaName'] }}</td>
                                                        <td>{{ $project['projectName'] }}</td>
                                                        <!-- <td>{{ $project['vendorName'] }}</td> -->
                                                        <td>{{ $project['stateName'] }}</td>
                                                        <td>{{ $project['districtName'] }}</td>
                                                        <td>{{ $project['uploadDate'] }}</td>
                                                        <td>
                                                            <a href="/show/{{ $project['view'] }}"
                                                                class="btn btn-sm btn-outline-primary">View </a>
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No record found, Please enter
                                                            valid input!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- /.container-fluid -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
@endsection
