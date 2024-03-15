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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('openuser.list') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('openuser.list') }}">Back</a></li>
              <!-- <li class="breadcrumb-item active">Dashboard</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        @forelse ($bobs->reverse() as $bob)
        <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card-header">
                <h3 class="card-title"><b>BOB Commission Month/Year: </b> {{ \Carbon\Carbon::parse($bob->from_date)->format('m-Y') }}</h3>
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
                      <td>ORGANIZATION</td>
                      <td>{{$bob->bc_org}}</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>VILLAGE ID</td>
                      <td>{{$bob->vle_id}}</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>VENDOR CODE</td>
                      <td>{{$bob->vendor_code}}</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>FROM DATE</td>
                      <td>{{$bob->from_date}}</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>TO DATE</td>
                      <td>{{$bob->to_date}}</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>STATE</td>
                      <td>{{$bob->state}}</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>REGION NAME</td>
                      <td>{{$bob->region_name}}</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>DISTRICT</td>
                      <td>{{$bob->district}}</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>SUB-DISTRICT</td>
                      <td>{{$bob->sub_district}}</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>BRANCH ID</td>
                      <td>{{$bob->branch_id}}</td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>BRANCH</td>
                      <td>{{$bob->branch}}</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>RURAL-URBAN</td>
                      <td>{{$bob->rural_urban}}</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>VILLAGE NAME</td>
                      <td>{{$bob->vle_name}}</td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>VILLAGE</td>
                      <td>{{$bob->village}}</td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td>OD ACCOUNT</td>
                      <td>{{$bob->od_account}}</td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td>PHONE NO.</td>
                      <td>{{$bob->phone_no}}</td>
                    </tr>
                    <tr>
                      <td>17</td>
                      <td>BRANCH NAME</td>
                      <td>{{$bob->branch_name}}</td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>EKYC A/C OPENED FUNDED</td>
                      <td>{{$bob->ekyc_acc_opend_funded}}</td>
                    </tr>
                    <tr>
                      <td>19</td>
                      <td>EKYC A/C OPNED NON-FUNDED</td>
                      <td>{{$bob->ekyc_acc_opend_nfunded}}</td>
                    </tr>
                    <tr>
                      <td>20</td>
                      <td>EKYC A/C FUNDED COMMISSION</td>
                      <td>{{$bob->ekyc_acc_funded_commission}}</td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>EKYC A/C NON-FUNDED COMMISSION</td>
                      <td>{{$bob->ekyc_acc_nfunded_commission}}</td>
                    </tr>
                    <tr>
                      <td>22</td>
                      <td>NON BSBD A/C OPENED</td>
                      <td>{{$bob->non_bsbd_acc_opened}}</td>
                    </tr>
                    <tr>
                      <td>23</td>
                      <td>COMMISSION NON BSBD A/C OPENED</td>
                      <td>{{$bob->comm_non_bsbd_accounts}}</td>
                    </tr>
                    <tr>
                      <td>24</td>
                      <td>FD A/C OPENED</td>
                      <td>{{$bob->fd_accounts_opened}}</td>
                    </tr>
                    <tr>
                      <td>25</td>
                      <td>FD AMOUNT</td>
                      <td>{{$bob->fd_amount}}</td>
                    </tr>
                    <tr>
                      <td>26</td>
                      <td>COMMISSION FD</td>
                      <td>{{$bob->commission_fd}}</td>
                    </tr>
                    <tr>
                      <td>27</td>
                      <td>RD ACCOUNT OPENED</td>
                      <td>{{$bob->rd_accounts_opened}}</td>
                    </tr>
                    <tr>
                      <td>28</td>
                      <td>RD AMOUNT</td>
                      <td>{{$bob->rd_amount}}</td>
                    </tr>
                    <tr>
                      <td>29</td>
                      <td>COMMISSION RD</td>
                      <td>{{$bob->commission_rd}}</td>
                    </tr>
                    <tr>
                      <td>30</td>
                      <td>PMSBY A/C OPNED</td>
                      <td>{{$bob->pmsby_accounts_opened}}</td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>COMMISSION PMSBY</td>
                      <td>{{$bob->commission_pmsby}}</td>
                    </tr>
                    <tr>
                      <td>32</td>
                      <td>PMJJBY A/C ACCOUNT OPENED</td>
                      <td>{{$bob->pmjjby_accounts_opened}}</td>
                    </tr>
                    <tr>
                      <td>33</td>
                      <td>COMMISSION PMJJBY</td>
                      <td>{{$bob->commission_pmjjby}}</td>
                    </tr>
                    <tr>
                      <td>34</td>
                      <td>APY A/C OPENED</td>
                      <td>{{$bob->apy_accounts_opened}}</td>
                    </tr>
                    <tr>
                      <td>35</td>
                      <td>COMMISSION APY</td>
                      <td>{{$bob->commission_apy}}</td>
                    </tr>
                    <tr>
                      <td>36</td>
                      <td>TOTAL AADHAR SEEDING</td>
                      <td>{{$bob->total_aadhar_seeding}}</td>
                    </tr>
                    <tr>
                      <td>37</td>
                      <td>COMMISSION AADHAR SEEDING</td>
                      <td>{{$bob->commission_aadhar_seeding}}</td>
                    </tr>
                    <tr>
                      <td>38</td>
                      <td>TOTAL MOBILE SEEDING</td>
                      <td>{{$bob->total_mobile_seeding}}</td>
                    </tr>
                    <tr>
                      <td>39</td>
                      <td>COMMISSION MOBILE SEEDING</td>
                      <td>{{$bob->commission_mobile_seeding}}</td>
                    </tr>
                    <tr>
                      <td>40</td>
                      <td>TOTAL TRANX WITHDRAWL</td>
                      <td>{{$bob->total_trnx_withdrawl}}</td>
                    </tr>
                    <tr>
                      <td>41</td>
                      <td>TOTAL TRNX AMOUNT WITHDRWAL</td>
                      <td>{{$bob->total_trnx_amt_withdrawl}}</td>
                    </tr>
                    <tr>
                      <td>42</td>
                      <td>COMMISSION WITHDRAWL</td>
                      <td>{{$bob->commission_withdrawl}}</td>
                    </tr>
                    <tr>
                      <td>43</td>
                      <td>TOTAL TRANSACTION DEPOSIT</td>
                      <td>{{$bob->total_trnx_deposit}}</td>
                    </tr>
                    <tr>
                      <td>44</td>
                      <td>TOTAL TRANSACTION AMOUNT DEPOSIT</td>
                      <td>{{$bob->total_trnx_amt_deposit}}</td>
                    </tr>
                    <tr>
                      <td>45</td>
                      <td>COMMISSION DEPOSIT</td>
                      <td>{{$bob->commission_deposit}}</td>
                    </tr>
                    <tr>
                      <td>46</td>
                      <td>TOTAL TRANSACTION FUNDTRANSFER</td>
                      <td>{{$bob->total_trnx_fundtrnsfer}}</td>
                    </tr>
                    <tr>
                      <td>47</td>
                      <td>TOTAL TRANSACTION AMOUNT FUNDTRANSFER</td>
                      <td>{{$bob->total_trnx_amt_fundtrnsfer}}</td>
                    </tr>
                    <tr>
                      <td>48</td>
                      <td>COMMISSION FUNDTRANSFER</td>
                      <td>{{$bob->commission_fundtrnsfer}}</td>
                    </tr>
                    <tr>
                      <td>49</td>
                      <td>TOTAL IMPS TRANSACTION</td>
                      <td>{{$bob->total_imps_trnx}}</td>
                    </tr>
                    <tr>
                      <td>50</td>
                      <td>TOTAL TRNX AMOUT IMPS</td>
                      <td>{{$bob->total_trnx_amt_imps}}</td>
                    </tr>
                    <tr>
                      <td>51</td>
                      <td>COMMISSION IMPS TRNX</td>
                      <td>{{$bob->commission_imps_trnx}}</td>
                    </tr>
                    <tr>
                      <td>52</td>
                      <td>TOTAL CHEQUE BOOK ISSUED</td>
                      <td>{{$bob->total_chq_book_issued}}</td>
                    </tr>
                    <tr>
                      <td>53</td>
                      <td>COMMISSION CHEQUE BOOK ISSUED</td>
                      <td>{{$bob->commission_chq_book_issued}}</td>
                    </tr>
                    <tr>
                      <td>54</td>
                      <td>TOTAL CHEQUE STOPPED</td>
                      <td>{{$bob->total_chq_stopped}}</td>
                    </tr>
                    <tr>
                      <td>55</td>
                      <td>COMMISSION CHEQUE STOPPED</td>
                      <td>{{$bob->commission_chq_stopped}}</td>
                    </tr>
                    <tr>
                      <td>56</td>
                      <td>TOTAL RUPAY DEBIT CARD ISSUE</td>
                      <td>{{$bob->total_rupay_deb_card_issued}}</td>
                    </tr>
                    <tr>
                      <td>57</td>
                      <td>COMMISSION RUPAY DEBIT CARD ISSUE</td>
                      <td>{{$bob->commission_rupay_deb_card_issued}}</td>
                    </tr>
                    <tr>
                      <td>58</td>
                      <td>TOTAL BBPS TRNX</td>
                      <td>{{$bob->total_bbps_trnx}}</td>
                    </tr>
                    <tr>
                      <td>59</td>
                      <td>TOTAL BBPS AMOUNT</td>
                      <td>{{$bob->total_bbps_amount}}</td>
                    </tr>
                    <tr>
                      <td>60</td>
                      <td>COMMISSION BBPS</td>
                      <td>{{$bob->commision_bbps}}</td>
                    </tr>
                       <tr>
                      <td>61</td>
                      <td>TOTAL PSP PRINT</td>
                      <td>{{$bob->total_psp_print}}</td>
                    </tr>
                    <tr>
                      <td>62</td>
                      <td>COMMISSION PSP PRINT</td>
                      <td>{{$bob->commission_psp_print}}</td>
                    </tr>
                    <tr>
                      <td>63</td>
                      <td>TOTAL SMS ALERTS</td>
                      <td>{{$bob->total_sms_alerts}}</td>
                    </tr>
                    <tr>
                      <td>64</td>
                      <td>COMMISSION SMS ALERT</td>
                      <td>{{$bob->commission_sms_alert}}</td>
                    </tr>
                    <tr>
                      <td>65</td>
                      <td>TOTAL DEBIT CARD BLOCKED</td>
                      <td>{{$bob->total_deb_card_blocked}}</td>
                    </tr>
                    <tr>
                      <td>66</td>
                      <td>COMMISSION DEBIT CARD BLOCKED</td>
                      <td>{{$bob->commission_deb_card_blocked}}</td>
                    </tr>
                    <tr>
                      <td>67</td>
                      <td>TOTAL PMJDYOD REG</td>
                      <td>{{$bob->total_pmjdyod_reg}}</td>
                    </tr>
                    <tr>
                      <td>68</td>
                      <td>TOTAL PMJDYOD AMOUNT</td>
                      <td>{{$bob->total_pmjdyod_amt}}</td>
                    </tr>
                    <tr>
                      <td>69</td>
                      <td>COMMISSION PMJDYOD</td>
                      <td>{{$bob->commission_pmjdyod}}</td>
                    </tr>
                    <tr>
                      <td>70</td>
                      <td>TOTAL NEFT TRNX</td>
                      <td>{{$bob->total_neft_trnx}}</td>
                    </tr>
                    <tr>
                      <td>71</td>
                      <td>TOTAL NEFT AMOUNT</td>
                      <td>{{$bob->total_neft_amt}}</td>
                    </tr>
                    <tr>
                      <td>72</td>
                      <td>COMMISSION NEFT</td>
                      <td>{{$bob->commission_neft}}</td>
                    </tr>
                    <tr>
                      <td>73</td>
                      <td><b>TOTAL PAYMENT</b></td>
                      <td><b>{{$bob->total_payment}}</b></td>
                    </tr>
                    <tr>
                      <td>74</td>
                      <td>INCENTIVE FOR DEPOSIT MOBILIZATION</td>
                      <td>{{$bob->incentive_for_deposit_mobilization}}</td>
                    </tr>
                    <tr>
                      <td>75</td>
                      <td>LOAN LEAD INCENTIVE</td>
                      <td>{{$bob->loan_lead_incentive}}</td>
                    </tr>
                    <tr>
                      <td>76</td>
                      <td>INCENTIVE FOR NPA RECOVERY</td>
                      <td>{{$bob->incentive_for_npa_recovery}}</td>
                    </tr>
                    <tr>
                      <td>77</td>
                      <td><b>FINAL COMMISSION</b></td>
                      <td><b>{{$bob->final_commission}}</b></td>
                    </tr>
                    <tr>
                      <td>78</td>
                      <td><b>TDS</b></td>
                      <td><b>{{$bob->tds}}</b></td>
                    </tr>
                    <tr>
                      <td>79</td>
                      <td><b>BC NET COMMISSION</b></td>
                      <td><b>{{$bob->net_commission}}</b></td>
                    </tr>
                    <tr>
                      <td>80</td>
                      <td><b>BC NET PAYABLE</b></td>
                      <td><b>{{$bob->bc_net_payable}}</b></td>
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