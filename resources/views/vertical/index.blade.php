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
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Projects </h3>
                <div class="table-responsive">
                  <table id="example2" class="table table-hover table-striped table-bordered">
                    <thead class="bg-secondary text-light">
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Project Spoc</th>
                        <th>Status</th>
                        <!--<th>Details</th>-->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($data as $project)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $project['name'] }}</td>
                        <td>{{ $project['head'] }}</td>
                        <td>{{ $project['status'] }}</td>
                        <!--<td>{{ $project['details'] }}</td>-->
                        <td><a href="/vertical/project/{{ $project['id'] }}" class="btn btn-sm btn-outline-primary">View</a></td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="6" class="text-center text-danger">No record found, Please enter valid input!</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
@endsection