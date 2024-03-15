@php
$profile = ['name' => $authdata['name'], 'role' => $authdata['role']];
@endphp
@extends('layouts.theme', $profile)

@section('content')
<style>
    /* Custom styles for the image gallery */
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 10px;
        padding: 10px;
    }

    .gallery img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
</style>
</style>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="vendors-tab" data-bs-toggle="tab" data-bs-target="#vendors" type="button" role="tab" aria-controls="vendors" aria-selected="false">Vendors</button>
                                    </li>
                                    <!-- <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab" aria-controls="media" aria-selected="false">Media</button>
                                    </li> -->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="teams-tab" data-bs-toggle="tab" data-bs-target="#teams" type="button" role="tab" aria-controls="teams" aria-selected="false">Teams</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped">
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
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="mb-3">Vedors Reports</h5>
                                                <ul class="nav nav-tabs" id="mediaTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pdf-tab" data-bs-toggle="tab" data-bs-target="#pdf" type="button" role="tab" aria-controls="pdf" aria-selected="true">PDF</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="excel-tab" data-bs-toggle="tab" data-bs-target="#excel" type="button" role="tab" aria-controls="excel" aria-selected="false">Excel</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="photo-tab" data-bs-toggle="tab" data-bs-target="#photo" type="button" role="tab" aria-controls="photo" aria-selected="false">Photo</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="mediaTabContent">
                                                    <div class="tab-pane fade show active" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered table-striped" id="pdfTable">
                                                                <thead class="bg-secondary text-light">
                                                                    <tr>
                                                                        <th>S.No.</th>
                                                                        <th>Media Name</th>
                                                                        <th>Upload Date</th>
                                                                        <th>View</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                    $serialNumber = 1;
                                                                    @endphp
                                                                    @foreach ($mediaData as $media)
                                                                    @if (in_array(pathinfo($media['name'], PATHINFO_EXTENSION), ['pdf']))
                                                                    <tr>
                                                                        <td>{{ $serialNumber }}</td>
                                                                        <td>{{ $media['original_name'] }}</td>
                                                                        <td>{{ $media['created_at'] }}</td>
                                                                        <td><a href="{{ '/show/' . $media['name'] }}" target="_blank" class="btn btn-sm btn-outline-primary">Download</a></td>
                                                                    </tr>
                                                                    @php
                                                                    $serialNumber++;
                                                                    @endphp
                                                                    @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="excel" role="tabpanel" aria-labelledby="excel-tab">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered table-striped" id="excelTable">
                                                                <thead class="bg-secondary text-light">
                                                                    <tr>
                                                                        <th>S.No.</th>
                                                                        <th>Media Name</th>
                                                                        <th>Upload Date</th>
                                                                        <th>View</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                    $serialNumber = 1;
                                                                    @endphp
                                                                    @foreach ($mediaData as $media)
                                                                    @if (in_array(pathinfo($media['name'], PATHINFO_EXTENSION), ['xlsx', 'xls']))
                                                                    <tr>
                                                                        <td>{{ $serialNumber }}</td>
                                                                        <td>{{ $media['original_name'] }}</td>
                                                                        <td>{{ $media['created_at'] }}</td>
                                                                        <td><a href="{{ '/show/' . $media['name'] }}" target="_blank" class="btn btn-sm btn-outline-primary">Download</a></td>
                                                                    </tr>
                                                                    @php
                                                                    $serialNumber++;
                                                                    @endphp
                                                                    @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                                                        <div class="container">
                                                            <h1 class="text-center my-5">Image Gallery</h1><hr>

                                                            <div class="gallery card">
                                                                @foreach ($mediaData as $media)
                                                                @if (in_array(pathinfo($media['name'], PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg']))
                                                                <div >
                                                                    <a href="{{ '/show/' . $media['name'] }}" target="_blank">
                                                                        <img src="{{ '/show/' . $media['name'] }}" alt="{{ $media['original_name'] }}"  class="shadow bg-white rounded" style="height: 200px; width:400px;">
                                                                    </a>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                               
                                                            </div>
                                                        </div>

                                                        <!-- <div class="table-responsive">

                                                            <table class="table table-hover table-bordered table-striped" id="photoTable">
                                                                <thead class="bg-secondary text-light">
                                                                    <tr>
                                                                        <th>S.No.</th>
                                                                        <th>Media Name</th>
                                                                        <th>Upload Date</th>
                                                                        <th>View</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @php
                                                                    $serialNumber = 1;
                                                                    @endphp
                                                                    @foreach ($mediaData as $media)
                                                                    @if (in_array(pathinfo($media['name'], PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg']))
                                                                    <tr>
                                                                        <td>{{ $serialNumber }}</td>
                                                                        <td>{{ $media['original_name'] }}</td>
                                                                        <td>{{ $media['created_at'] }}</td>
                                                                        <td>
                                                                            <a href="{{ '/show/' . $media['name'] }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                                                            <br>
                                                                            <img src="{{ '/show/' . $media['name'] }}" alt="{{ $media['original_name'] }}" style="max-width: 100px; max-height: 100px;">
                                                                        </td>
                                                                    </tr>
                                                                    @php
                                                                    $serialNumber++;
                                                                    @endphp
                                                                    @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div> -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="teams" role="tabpanel" aria-labelledby="teams-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped" id="example3">
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
                                                                <td>
                                                                    @if($team->status === 1)
                                                                    <a class="btn btn-sm btn-success ">Active</a>
                                                                    @else
                                                                    <a class="btn btn-sm btn-danger ">Inactive</a>
                                                                    @endif
                                                                </td>


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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="vendors" role="tabpanel" aria-labelledby="vendors-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped" id="example4">
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
                                                                <td>{{ \Carbon\Carbon::parse($vendor['start_date'])->format('M d, Y') }}</td>
                                                                <td>{{ $vendor['end_date'] }}</td>
                                                                <td>{{ $vendor['status'] }}</td>
                                                                <td><a href="/spoc/vendor/{{ $vendor['vaa_id'] }}" class="btn btn-sm btn-outline-primary ">View</td>
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

@section('script')
<script>
    $(function() {


        $('#example4').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection