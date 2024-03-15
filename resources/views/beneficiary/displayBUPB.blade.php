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
         @forelse ($bugbs->reverse() as $bob)
        <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card-header">
                <h3 class="card-title"><b>BUPB COMMISSION Month/Year: </b> {{ \Carbon\Carbon::parse($bob->TO_DATE)->format('m-Y') }}</h3>
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
                      <td>VENDOR-CODE</td>
                      <td>{{ $bob->VENDOR_CODE }}</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>FROM-DATE</td>
                      <td>{{ $bob->FROM_DATE }}</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>TO-DATE</td>
                      <td>{{ $bob->TO_DATE }}</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>STATE</td>
                      <td>{{ $bob->STATE }}</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>REGION NAME</td>
                      <td>{{ $bob->REGION_NAME }}</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>DISTRICT</td>
                      <td>{{$bob->DISTRICT}}</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>SUB DISTRICT</td>
                      <td>{{$bob->SUB_DISTRICT}}</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>BC ORGANIZATION</td>
                      <td>{{$bob->BC_ORGANIZATION}}</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>BRANCH ID</td>
                      <td>{{$bob->BRANCH_ID}}</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>CATEGORY</td>
                      <td>{{$bob->CATEGORY}}</td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>BRANCH</td>
                      <td>{{$bob->BRANCH}}</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>VILLAGE ID</td>
                      <td>{{$bob->VLE_ID}}</td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>VILLAGE NAME</td>
                      <td>{{$bob->VLE_NAME}}</td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>VILLAGE</td>
                      <td>{{$bob->VILLAGE}}</td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td>OD ACCOUNT</td>
                      <td>{{$bob->OD_ACCOUNT}}</td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td>PHONE NO</td>
                      <td>{{$bob->PHONE_NO}}</td>
                    </tr>
                    <tr>
                      <td>17</td>
                      <td><b>BRANCH NAME</b></td>
                      <td><b>{{$bob->BRANCH_NAME}}</b></td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>EKYC ACCOUNTS OPENED</td>
                      <td>{{$bob->EKYC_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>19</td>
                      <td>EKYC ACCTS OPENED COMMISION</td>
                      <td>{{$bob->EKYC_ACCTS_OPENED_COMMISION}}</td>
                    </tr>
                    <tr>
                      <td>20</td>
                      <td>EKYC ACCOUNTS OPENED FUNDED</td>
                      <td>{{$bob->EKYC_ACCOUNTS_OPENED_FUNDED}}</td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>EKYC ACCTS FUNDED COMMISSION</td>
                      <td>{{$bob->EKYC_ACCTS_FUNDED_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>22</td>
                      <td>FD ACCOUNTS OPENED</td>
                      <td>{{$bob->FD_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>23</td>
                      <td>FD AMOUNT</td>
                      <td>{{$bob->FD_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>24</td>
                      <td>COMMISION FD</td>
                      <td>{{$bob->COMMISION_FD}}</td>
                    </tr>
                    <tr>
                      <td>25</td>
                      <td>RD ACCOUNTS OPENED</td>
                      <td>{{$bob->RD_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>26</td>
                      <td>RD AMOUNT</td>
                      <td>{{$bob->RD_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>27</td>
                      <td>COMMISION RD</td>
                      <td>{{$bob->COMMISION_RD}}</td>
                    </tr>
                    <tr>
                      <td>28</td>
                      <td>PMSBY ACCOUNTS OPENED</td>
                      <td>{{$bob->PMSBY_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>29</td>
                      <td>COMMISSION PMSBY</td>
                      <td>{{$bob->COMMISSION_PMSBY}}</td>
                    </tr>
                    <tr>
                      <td>30</td>
                      <td>PMJJBY ACCOUNTS OPENED</td>
                      <td>{{$bob->PMJJBY_ACCOUNTS_OPENED}}</td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>COMMISION DEPOSIT</td>
                      <td>{{$bob->COMMISION_DEPOSIT}}</td>
                    </tr>
                    <tr>
                      <td>32</td>
                      <td>TOTAL TXNS FUNDTRANSFER</td>
                      <td>{{$bob->TOTAL_TXNS_FUNDTRANSFER}}</td>
                    </tr>
                    <tr>
                      <td>33</td>
                      <td>TOTAL TXN AMOUNT FUNDTRANSFER</td>
                      <td>{{$bob->TOT_TXN_AMOUNT_FUNDTRANSFER}}</td>
                    </tr>
                    <tr>
                      <td>34</td>
                      <td>COMMISSION FUNDTRANSFER</td>
                      <td>{{$bob->COMMISSION_FUNDTRANSFER}}</td>
                    </tr>
                    <tr>
                      <td>35</td>
                      <td><b>GENDER</b></td>
                      <td><b>{{$bob->GENDER}}</b></td>
                    </tr>
                    <tr>
                      <td>36</td>
                      <td>NO OF DAYS</td>
                      <td>{{$bob->NO_OF_DAYS}}</td>
                    </tr>
                    <tr>
                      <td>37</td>
                      <td>APY SETTLEMENT</td>
                      <td>{{$bob->APY_SETTLEMENT}}</td>
                    </tr>
                    <tr>
                      <td>38</td>
                      <td><b>TOTAL COMM</b></td>
                      <td><b>{{$bob->TOTAL_COMM}}</b></td>
                    </tr>
                    <tr>
                      <td>39</td>
                      <td>COMMISSION PMJJBY</td>
                      <td>{{$bob->COMMISSION_PMJJBY}}</td>
                    </tr>
                    <tr>
                      <td>40</td>
                      <td>TOTAL AADHAR SEEDING</td>
                      <td>{{$bob->TOTAL_AADHAR_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>41</td>
                      <td>COMMISSION AADHAR SEEDING</td>
                      <td>{{$bob->COMMISSION_AADHAR_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>42</td>
                      <td>TOTAL MOBILE SEEDING</td>
                      <td>{{$bob->TOTAL_MOBILE_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>43</td>
                      <td>COMMISSION MOBILE SEEDING</td>
                      <td>{{$bob->COMMISSION_MOBILE_SEEDING}}</td>
                    </tr>
                    <tr>
                      <td>44</td>
                      <td>TOTAL APY</td>
                      <td>{{$bob->TOTAL_APY}}</td>
                    </tr>
                    <tr>
                      <td>45</td>
                      <td>COMMISSION APY</td>
                      <td>{{$bob->COMMISSION_APY}}</td>
                    </tr>
                    <tr>
                      <td>46</td>
                      <td>TOTAL TXNS WITHDRAWL</td>
                      <td>{{$bob->TOTAL_TXNS_WITHDRAWL}}</td>
                    </tr>
                    <tr>
                      <td>47</td>
                      <td>TOTAL TXN AMOUNT WITHDRAWL</td>
                      <td>{{$bob->TOTAL_TXN_AMOUNT_WITHDRAWL}}</td>
                    </tr>
                    <tr>
                      <td>48</td>
                      <td>COMMISION WITHDRAWL</td>
                      <td>{{$bob->COMMISION_WITHDRAWL}}</td>
                    </tr>
                    <tr>
                      <td>49</td>
                      <td>TOTAL TXNS DEPOSIT</td>
                      <td>{{$bob->TOTAL_TXNS_DEPOSIT}}</td>
                    </tr>
                    <tr>
                      <td>50</td>
                      <td>TOTAL TXN AMOUNT DEPOSIT</td>
                      <td>{{$bob->TOTAL_TXN_AMOUNT_DEPOSIT}}</td>
                    </tr>
                    <tr>
                      <td>51</td>
                      <td><b>DATE OF FIRST TRANS</b></td>
                      <td><b>{{$bob->DATE_OF_FIRST_TRANS}}</b></td>
                    </tr>
                    <tr>
                      <td>52</td>
                      <td><b>TOTAL PAYMENT</b></td>
                      <td><b>{{$bob->TOTAL_PAYMENT}}</b></td>
                    </tr>
                    <tr>
                      <td>53</td>
                      <td><b>TDS</b></td>
                      <td><b>{{$bob->TDS}}</b></td>
                    </tr>
                    <tr>
                      <td>54</td>
                      <td><b>NET COMM</b></td>
                      <td><b>{{$bob->NET_COMM}}</b></td>
                    </tr>
                    <tr>
                      <td>55</td>
                      <td><b>BC SHARE</b></td>
                      <td><b>{{$bob->BC_SHARE}}</b></td>
                    </tr>
                    <tr>
                      <td>55</td>
                      <td><b>INCENTIVE</b></td>
                      <td><b>{{$bob->INCENTIVE}}</b></td>
                    </tr>
                    <tr>
                      <td>55</td>
                      <td><b>NET PAYABLE</b></td>
                      <td><b>{{$bob->NET_PAYABLE}}</b></td>
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