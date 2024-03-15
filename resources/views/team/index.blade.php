@php
    $profile = ['name' => $data['name'], 'role' => $data['role']];
@endphp
@extends('layouts.theme', $profile)

@section('content')



<body class="hold-transition sidebar-mini">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">

                <h3 class="card-title">Projects </h3>

                <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead class="bg-secondary text-light">
                      <tr>
                        <th>No</th>
                        <th>Project Name</th>
                        <th>Details</th>

                        <!-- <th>Added By</th> -->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($projects as $pro)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $pro->p_name }}</td>
                        <td>{{ $pro->p_details }}</td>



                        <td><a href="/team/getProject/{{ $pro->id}}" class="btn btn-sm btn-outline-primary ">View</a></td>
                      </tr>
                      @empty
                      <p class="btn btn-outline-danger">No record found, Please enter valid input!</p>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- /.col -->
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