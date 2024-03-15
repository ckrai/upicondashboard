@extends('layouts.theme')

@section('content')
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
                                <h5 class="card-title">Media Details</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="example2">
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
                                            <tr>
                                                <td>{{ $serialNumber }}</td>
                                                <td>{{ $media['original_name'] }}</td>
                                                <td>{{ $media['created_at'] }}</td>
                                                <td><a href="{{ '/show/' . $media['name'] }}" target="_blank" class="btn btn-sm btn-outline-primary">Download</a>
                                                </td>
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

        </section>
    </div>



</body>
@endsection

@section('script')
<script>
    $(function() {

        $('#example3').DataTable({
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