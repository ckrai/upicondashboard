@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="3.3.6/css/bootstrap.min.css">
  <!-- <link href="http://meyerweb.com/eric/tools/css/reset/reset.css" rel="stylesheet" />-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endpush
@section('content')
<body class="hold-transition sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Dashboard</h3>
            <!-- <a type="button" class="abc">Break</a> -->
          </div><!-- /.col -->
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('openuser.searchBGGB') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route ('openuser.searchBGGB')}}">Back</a></li>
              <!-- <li class="breadcrumb-item active">Dashboard</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <section class="content">
      <div class="container-fluid">
         @forelse ($bggbs->reverse() as $bob)
        <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card-header">
                <h3 class="card-title"><b>Month/Year: </b> {{ \Carbon\Carbon::parse($bob->FROM_DATE)->format('m-Y') }}</h3>
              </div> 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dsfdfl" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>TYPE/KEY</th>
                      <th>VALUE/COMMISSION</th>
                    </tr>
                    </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>VENDOR_CODE</td>
                      <td>{{$bob->VENDOR_CODE}}</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>FROM_DATE</td>
                      <td>{{$bob->FROM_DATE}}</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>TO_DATE</td>
                      <td>{{$bob->TO_DATE}}</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>STATE</td>
                      <td>{{$bob->STATE}}</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>REGION_NAME</td>
                      <td>{{$bob->REGION_NAME}}</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>DISTRICT</td>
                      <td>{{$bob->DISTRICT}}</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>SUB_DISTRICT</td>
                      <td>{{$bob->SUB_DISTRICT}}</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>BC_ORGANIZATION</td>
                      <td>{{$bob->BC_ORGANIZATION}}</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>BRANCH_ID</td>
                      <td>{{$bob->BRANCH_ID}}</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>BRANCH</td>
                      <td>{{$bob->BRANCH}}</td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>VLE_ID</td>
                      <td>{{$bob->VLE_ID}}</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>VLE_NAME</td>
                      <td>{{$bob->VLE_NAME}}</td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>VILLAGE</td>
                      <td>{{$bob->VILLAGE}}</td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>CENTRE</td>
                      <td>{{$bob->CENTRE}}</td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td>OD_ACCOUNT</td>
                      <td>{{$bob->OD_ACCOUNT}}</td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td>PHONE_NO</td>
                      <td>{{$bob->PHONE_NO}}</td>
                    </tr>
                    <tr>
                      <td>17</td>
                      <td>BRANCH_NAME</td>
                      <td>{{$bob->BRANCH_NAME}}</td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>NONEKYC_ACCTS_OPENED</td>
                      <td>{{$bob->NONEKYC_ACCTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>19</td>
                      <td>NONEKYC_ACCTS_OPENED_COMMISION</td>
                      <td>{{$bob->NONEKYC_ACCTS_OPENED_COMMISION}}</td>
                    </tr>
                    <tr>
                      <td>20</td>
                      <td>NONEKYC_ACCTS_OPENED_NF</td>
                      <td>{{$bob->NONEKYC_ACCTS_OPENED_NF}}</td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>NONEKYC_ACCTS_OPENED_NF_COMM</td>
                      <td>{{$bob->NONEKYC_ACCTS_OPENED_NF_COMM}}</td>
                    </tr>
                    <tr>
                      <td>22</td>
                      <td>CENTRE</td>
                      <td>{{$bob->CENTRE}}</td>
                    </tr>
                    <tr>
                      <td>23</td>
                      <td>OD_ACCOUNT</td>
                      <td>{{$bob->OD_ACCOUNT}}</td>
                    </tr>
                    <tr>
                      <td>24</td>
                      <td>PHONE_NO</td>
                      <td>{{$bob->PHONE_NO}}</td>
                    </tr>
                    <tr>
                      <td>25</td>
                      <td>BRANCH_NAME</td>
                      <td>{{$bob->BRANCH_NAME}}</td>
                    </tr>
                    <tr>
                      <td>26</td>
                      <td>EKYC_ACCOUNTS_OPENED</td>
                      <td>{{$bob->EKYC_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>27</td>
                      <td>EKYC_ACCTS_OPENED_COMMISION</td>
                      <td>{{$bob->EKYC_ACCTS_OPENED_COMMISION}}</td>
                    </tr>
                    <tr>
                      <td>28</td>
                      <td>EKYC_ACCOUNTS_OPENED_N_FUND</td>
                      <td>{{$bob->EKYC_ACCOUNTS_OPENED_N_FUND}}</td>
                    </tr>
                    <tr>
                      <td>29</td>
                      <td>EKYC_ACCTS_OPENED_N_FUND_COMM</td>
                      <td>{{$bob->EKYC_ACCTS_OPENED_N_FUND_COMM}}</td>
                    </tr>
                    <tr>
                      <td>30</td>
                      <td>FD_ACCOUNTS_OPENED</td>
                      <td>{{$bob->FD_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>FD_AMOUNT</td>
                      <td>{{$bob->FD_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>32</td>
                      <td>COMMISION_FD</td>
                      <td>{{$bob->COMMISION_FD}}</td>
                    </tr>
                    <tr>
                      <td>33</td>
                      <td>RD_ACCOUNTS_OPENED</td>
                      <td>{{$bob->RD_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>34</td>
                      <td>RD_AMOUNT</td>
                      <td>{{$bob->RD_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>35</td>
                      <td>COMMISION_RD</td>
                      <td>{{$bob->COMMISION_RD}}</td>
                    </tr>
                    <tr>
                      <td>36</td>
                      <td>PMSBY_ACCOUNTS_OPENED</td>
                      <td>{{$bob->PMSBY_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>37</td>
                      <td>COMMISSION_PMSBY</td>
                      <td>{{$bob->COMMISSION_PMSBY}}</td>
                    </tr>
                    <tr>
                      <td>38</td>
                      <td>PMJJBY_ACCOUNTS_OPENED</td>
                      <td>{{$bob->PMJJBY_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>39</td>
                      <td>COMMISSION_PMJJBY</td>
                      <td>{{$bob->COMMISSION_PMJJBY}}</td>
                    </tr>
                    <tr>
                      <td>40</td>
                      <td>TOTAL_AADHAR_SEEDING</td>
                      <td>{{$bob->TOTAL_AADHAR_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>41</td>
                      <td>COMMISSION_AADHAR_SEEDING</td>
                      <td>{{$bob->COMMISSION_AADHAR_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>42</td>
                      <td>TOTAL_MOBILE_SEEDING</td>
                      <td>{{$bob->TOTAL_MOBILE_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>43</td>
                      <td>COMMISSION_MOBILE_SEEDING</td>
                      <td>{{$bob->COMMISSION_MOBILE_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>44</td>
                      <td>TOTAL_APY</td>
                      <td>{{$bob->TOTAL_APY}}</td>
                    </tr>
                    <tr>
                      <td>45</td>
                      <td>COMMISSION_APY</td>
                      <td>{{$bob->COMMISSION_APY}}</td>
                    </tr>
                    <tr>
                      <td>46</td>
                      <td>TOTAL_TXNS_WITHDRAWL</td>
                      <td>{{$bob->TOTAL_TXNS_WITHDRAWL}}</td>
                    </tr>
                    <tr>
                      <td>47</td>
                      <td>TOTAL_TXN_AMOUNT_WITHDRAWL</td>
                      <td>{{$bob->TOTAL_TXN_AMOUNT_WITHDRAWL}}</td>
                    </tr>
                    <tr>
                      <td>48</td>
                      <td>COMMISION_WITHDRAWL</td>
                      <td>{{$bob->COMMISION_WITHDRAWL}}</td>
                    </tr>
                    <tr>
                      <td>49</td>
                      <td>TOTAL_TXNS_DEPOSIT</td>
                      <td>{{$bob->TOTAL_TXNS_DEPOSIT}}</td>
                    </tr>
                    <tr>
                      <td>50</td>
                      <td>TOTAL_TXN_AMOUNT_DEPOSIT</td>
                      <td>{{$bob->TOTAL_TXN_AMOUNT_DEPOSIT}}</td>
                    </tr>
                    <tr>
                      <td>51</td>
                      <td>DATE_OF_FIRST_TRANS</td>
                      <td>{{$bob->DATE_OF_FIRST_TRANS}}</td>
                    </tr>
                    <tr>
                      <td>52</td>
                      <td>COUNT_OF_PERF_PAY</td>
                      <td>{{$bob->COUNT_OF_PERF_PAY}}</td>
                    </tr>
                    <tr>
                      <td>53</td>
                      <td>EXPIRY_DATE</td>
                      <td>{{$bob->EXPIRY_DATE}}</td>
                    </tr>
                    <tr>
                      <td>54</td>
                      <td>MINIMUM_PERFORMANCE_PAY</td>
                      <td>{{$bob->MINIMUM_PERFORMANCE_PAY}}</td>
                    </tr>
                    <tr>
                      <td>55</td>
                      <td>TOTAL_PAYMENT</td>
                      <td>{{$bob->TOTAL_PAYMENT}}</td>
                    </tr>
                    <tr>
                      <td>56</td>
                      <td>TDS</td>
                      <td>{{$bob->TDS}}</td>
                    </tr>
                    <tr>
                      <td>57</td>
                      <td>NET_COMM</td>
                      <td>{{$bob->NET_COMM}}</td>
                    </tr>
                    <tr>
                      <td>58</td>
                      <td>BC_SHARE</td>
                      <td>{{$bob->BC_SHARE}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        @empty
        <p class="btn btn-outline-danger">No record found, Please enter valid input!</p>
        @endforelse
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>

</div>

@if(isset($gdgfhfh))
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endif
</body>
@endsection

@section('script')
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
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