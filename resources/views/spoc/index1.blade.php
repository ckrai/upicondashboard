@php
$profile = ['name' => $data['authName'], 'role' => $data['authRoleId']];
@endphp
@extends('layouts.theme', $profile)


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</style>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- /.content-header -->
        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 grid-margin stretch-card">
                        <!-- <div class="card">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-4 stretch-card grid-margin" style="height: 10rem;">
                                        <div class="card bg-gradient-danger card-img-holder text-white">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/theme/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                                                <h3 class="font-weight-normal mb-3">Projects
                                                </h3>
                                                <h1 class="mb-5">{{ $data['projectsCount'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 stretch-card grid-margin" style="height: 10rem;">
                                        <div class="card bg-gradient-info card-img-holder text-white">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/theme/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                                                <h3 class="font-weight-normal mb-3">Vendor
                                                </h3>
                                                <h1 class="mb-5">{{ $data['vendorCount'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 stretch-card grid-margin" style="height: 10rem;">
                                        <div class="card bg-gradient-success card-img-holder text-white">
                                            <div class="card-body">
                                                <img src="{{ asset('assets/theme/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                                                <h3 class="font-weight-normal mb-3">0
                                                </h3>
                                                <h1 class="mb-5">0</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>

                    <div class="col-md-12">
                        <div class="card">
                           

                            <div class="card-body ">
                                <h4 class="card-title">Project Status</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="example3">
                                        <thead class="bg-secondary text-light">
                                            <tr>
                                                <th>S.No</th>
                                                <th>NAME</th>
                                                <th>Verital Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($data['projects'] as $project)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $project['name'] }}</td>
                                                <td>{{ $project['vertical'] }}</td>
                                                <td>
                                                    <a href="/spoc/project/{{ $project['id'] }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="/spoc/media/{{ $project['id'] }}" class="btn btn-sm btn-outline-info"><i class="fa fa-upload" aria-hidden="true"></i></a>
                                                </td>
                                              
                                            </tr>
                                           @endforeach
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