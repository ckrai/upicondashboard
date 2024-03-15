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
              <li class="breadcrumb-item"><a href="{{ route('openuser.searchPNB') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route ('openuser.searchPNB')}}">Back</a></li>
              <!-- <li class="breadcrumb-item active">Dashboard</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <section class="content">
      <div class="container-fluid">
        @forelse ($pnbs->reverse() as $bob)
        <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card-header">
                <h3 class="card-title"><b>PNB Commission Month/Year: </b> {{ $bob->COMM_MONTH_YEAR }}</h3>
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
                      <td>AGENT_ID</td>
                      <td>{{$bob->AGENT_ID}}</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>ZONE_OFFICE_DESCRIPTION</td>
                      <td>{{$bob->ZONE_OFFICE_DESCRIPTION}}</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>CIRCLE_OFFICE_DESCRIPTION</td>
                      <td>{{$bob->CIRCLE_OFFICE_DESCRIPTION}}</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>CBC_NAME</td>
                      <td>{{$bob->CBC_NAME}}</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>CBC_SHORT_NAME</td>
                      <td>{{$bob->CBC_SHORT_NAME}}</td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>COMM_MONTH_YEAR</td>
                      <td>{{$bob->COMM_MONTH_YEAR}}</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>TOTAL_ENROLLMENT_COUNT</td>
                      <td>{{$bob->TOTAL_ENROLLMENT_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>PMJJBY</td>
                      <td>{{$bob->PMJJBY}}</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>PMSBY</td>
                      <td>{{$bob->PMSBY}}</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>APY</td>
                      <td>{{$bob->APY}}</td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>RD</td>
                      <td>{{$bob->RD}}</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>FD</td>
                      <td>{{$bob->FD}}</td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>EKYC_ENROLL_COUNT</td>
                      <td>{{$bob->EKYC_ENROLL_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>TOTAL_TRANSACTION_COUNT</td>
                      <td>{{$bob->TOTAL_TRANSACTION_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td>FIN_TRANSACTION_COUNT</td>
                      <td>{{$bob->FIN_TRANSACTION_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td>FIN_TRANSACTION_AMOUNT</td>
                      <td>{{$bob->FIN_TRANSACTION_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>17</td>
                      <td>INDO_NEPAL_COUNT</td>
                      <td>{{$bob->INDO_NEPAL_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>INDO_NEPAL_AMOUNT</td>
                      <td>{{$bob->INDO_NEPAL_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>19</td>
                      <td>IMPS_COUNT</td>
                      <td>{{$bob->IMPS_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>20</td>
                      <td>IMPS_AMOUNT</td>
                      <td>{{$bob->IMPS_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>21</td>
                      <td>AEPS_ONUS_DEPOSIT_COUNT</td>
                      <td>{{$bob->AEPS_ONUS_DEPOSIT_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>22</td>
                      <td>AEPS_ONUS_DEPOSIT_AMOUNT</td>
                      <td>{{$bob->AEPS_ONUS_DEPOSIT_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>23</td>
                      <td>AEPS_OFFUS_DEPOSIT_COUNT</td>
                      <td>{{$bob->AEPS_OFFUS_DEPOSIT_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>24</td>
                      <td>AEPS_OFFUS_DEPOSIT_AMOUNT</td>
                      <td>{{$bob->AEPS_OFFUS_DEPOSIT_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>25</td>
                      <td>AEPS_ONUS_WDL_CNT</td>
                      <td>{{$bob->AEPS_ONUS_WDL_CNT}}</td>
                    </tr>
                    <tr>
                      <td>26</td>
                      <td>AEPS_ONUS_WDL_AMOUNT</td>
                      <td>{{$bob->AEPS_ONUS_WDL_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>27</td>
                      <td>AEPS_OFFUS_WDL_CNT</td>
                      <td>{{$bob->AEPS_OFFUS_WDL_CNT}}</td>
                    </tr>
                    <tr>
                      <td>28</td>
                      <td>AEPS_OFFUS_WDL_AMT</td>
                      <td>{{$bob->AEPS_OFFUS_WDL_AMT}}</td>
                    </tr>
                    <tr>
                      <td>29</td>
                      <td>AEPS_FT_ONUS_CNT</td>
                      <td>{{$bob->AEPS_FT_ONUS_CNT}}</td>
                    </tr>
                    <tr>
                      <td>30</td>
                      <td>AEPS_FT_ONUS_AMT</td>
                      <td>{{$bob->AEPS_FT_ONUS_AMT}}</td>
                    </tr>
                    <tr>
                      <td>31</td>
                      <td>AEPS_FT_OFFUS_CNT</td>
                      <td>{{$bob->AEPS_FT_OFFUS_CNT}}</td>
                    </tr>
                    <tr>
                      <td>32</td>
                      <td>AEPS_FT_OFFUS_AMT</td>
                      <td>{{$bob->AEPS_FT_OFFUS_AMT}}</td>
                    </tr>
                    <tr>
                      <td>33</td>
                      <td>TPD_COUNT</td>
                      <td>{{$bob->TPD_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>34</td>
                      <td>TPD_AMOUNT</td>
                      <td>{{$bob->TPD_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>35</td>
                      <td>BBPS_COUNT</td>
                      <td>{{$bob->BBPS_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>36</td>
                      <td>BBPS_AMOUNT</td>
                      <td>{{$bob->BBPS_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>37</td>
                      <td>RUPAY_ONUS_WDL_CNT</td>
                      <td>{{$bob->RUPAY_ONUS_WDL_CNT}}</td>
                    </tr>
                    <tr>
                      <td>38</td>
                      <td>RUPAY_ONUS_WDL_AMT</td>
                      <td>{{$bob->RUPAY_ONUS_WDL_AMT}}</td>
                    </tr>
                    <tr>
                      <td>39</td>
                      <td>RUPAY_OFFUS_WDL_AMT</td>
                      <td>{{$bob->RUPAY_OFFUS_WDL_AMT}}</td>
                    </tr>
                    <tr>
                      <td>40</td>
                      <td>SHG_ONUS_WDL_CNT</td>
                      <td>{{$bob->SHG_ONUS_WDL_CNT}}</td>
                    </tr>
                    <tr>
                      <td>41</td>
                      <td>SHG_ONUS_WDL_AMT</td>
                      <td>{{$bob->SHG_ONUS_WDL_AMT}}</td>
                    </tr>
                    <tr>
                      <td>42</td>
                      <td>SHG_OFFUS_WDL_CNT</td>
                      <td>{{$bob->SHG_OFFUS_WDL_CNT}}</td>
                    </tr>
                    <tr>
                      <td>43</td>
                      <td>SHG_OFFUS_WDL_AMT</td>
                      <td>{{$bob->SHG_OFFUS_WDL_AMT}}</td>
                    </tr>
                    <tr>
                      <td>44</td>
                      <td>SHG_FT_ONUS_CNT</td>
                      <td>{{$bob->SHG_FT_ONUS_CNT}}</td>
                    </tr>
                    <tr>
                      <td>45</td>
                      <td>SHG_FT_ONUS_AMT</td>
                      <td>{{$bob->SHG_FT_ONUS_AMT}}</td>
                    </tr>
                    <tr>
                      <td>46</td>
                      <td>SHG_FT_OFFUS_CNT</td>
                      <td>{{$bob->SHG_FT_OFFUS_CNT}}</td>
                    </tr>
                    <tr>
                      <td>47</td>
                      <td>SHG_FT_OFFUS_AMT</td>
                      <td>{{$bob->SHG_FT_OFFUS_AMT}}</td>
                    </tr>
                    <tr>
                      <td>48</td>
                      <td>UID_SEEDING_COUNT</td>
                      <td>{{$bob->UID_SEEDING_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>49</td>
                      <td>RENEW_TD_RD_COUNT</td>
                      <td>{{$bob->RENEW_TD_RD_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>50</td>
                      <td>NEFT_COUNT</td>
                      <td>{{$bob->NEFT_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>51</td>
                      <td>NEFT_AMOUNT</td>
                      <td>{{$bob->NEFT_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>52</td>
                      <td>PASSBOOK COUNT</td>
                      <td>{{$bob->PASSBOOK_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>53</td>
                      <td>STOP_CHQ_CNT</td>
                      <td>{{$bob->STOP_CHQ_CNT}}</td>
                    </tr>
                    <tr>
                      <td>54</td>
                      <td>SMS_EML_STMT_COUNT</td>
                      <td>{{$bob->SMS_EML_STMT_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>55</td>
                      <td>APPLY_NEW_DBT_CRD_CNT</td>
                      <td>{{$bob->APPLY_NEW_DBT_CRD_CNT}}</td>
                    </tr>
                    <tr>
                      <td>56</td>
                      <td>BLK_DBT_CRD_CNTl</td>
                      <td>{{$bob->BLK_DBT_CRD_CNTl}}</td>
                    </tr>
                    <tr>
                      <td>57</td>
                      <td>NEW_CHQ_BK_CNT</td>
                      <td>{{$bob->NEW_CHQ_BK_CNT}}</td>
                    </tr>
                    <tr>
                      <td>58</td>
                      <td>MOBILE_SEEDING_COUNT</td>
                      <td>{{$bob->MOBILE_SEEDING_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>59</td>
                      <td>CHQ_COLLECTION_COUNT</td>
                      <td>{{$bob->CHQ_COLLECTION_COUNT}}</td>
                    </tr>
                    <tr>
                      <td>60</td>
                      <td>AEPS_DEPOSIT_COMMISSION</td>
                      <td>{{$bob->AEPS_DEPOSIT_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>61</td>
                      <td>AEPS_OFFUS_DEPOSIT_COMMISSION</td>
                      <td>{{$bob->AEPS_OFFUS_DEPOSIT_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>62</td>
                      <td>WITHDRAWAL_OFFUS_COMMISSION</td>
                      <td>{{$bob->WITHDRAWAL_OFFUS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>63</td>
                      <td>WITHDRAWAL_ONUS_COMMISSION</td>
                      <td>{{$bob->WITHDRAWAL_ONUS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>64</td>
                      <td>RUPAY_ONUS_COMMISSION</td>
                      <td>{{$bob->RUPAY_ONUS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>65</td>
                      <td>RUPAY_OFFUS_COMMISSION</td>
                      <td>{{$bob->RUPAY_OFFUS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>66</td>
                      <td>FUNDTRANSFER_ONUS_COMMISSION</td>
                      <td>{{$bob->FUNDTRANSFER_ONUS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>67</td>
                      <td>FUNDTRANSFER_OFFUS_COMMISSION</td>
                      <td>{{$bob->FUNDTRANSFER_OFFUS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>68</td>
                      <td>BBPS COMMISSION</td>
                      <td>{{$bob->BBPS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>69</td>
                      <td>TPD DEPOSIT COMMISSION</td>
                      <td>{{$bob->TPD_DEPOSIT_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>70</td>
                      <td>RD COMMISSION</td>
                      <td>{{$bob->RD_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>71</td>
                      <td>FD COMMISSION</td>
                      <td>{{$bob->FD_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>72</td>
                      <td>EKYC COMMISSION AMOUNT</td>
                      <td>{{$bob->EKYC_COMMISSION_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>73</td>
                      <td>IMPS COMMISSION</td>
                      <td>{{$bob->IMPS_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>74</td>
                      <td>INDO_COMMISSION_AMOUNT</td>
                      <td>{{$bob->INDO_COMMISSION_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>75</td>
                      <td>UID_SEEDING_COMMISSION</td>
                      <td>{{$bob->UID_SEEDING_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>76</td>
                      <td>RENEW_TD_RD_COMMISSION</td>
                      <td>{{$bob->RENEW_TD_RD_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>77</td>
                      <td>NEFT COMMISSION</td>
                      <td>{{$bob->NEFT_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>78</td>
                      <td>STOP_CHQ_COMMISSION</td>
                      <td>{{$bob->STOP_CHQ_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>79</td>
                      <td>SMS_EML_STMT_COMMISSION</td>
                      <td>{{$bob->SMS_EML_STMT_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>80</td>
                      <td>APPLY_NEW_DBT_CRD_COMM</td>
                      <td>{{$bob->APPLY_NEW_DBT_CRD_COMM}}</td>
                    </tr>
                      <tr>
                      <td>81</td>
                      <td>BLK_DBT_CRD_COMM</td>
                      <td>{{$bob->BLK_DBT_CRD_COMM}}</td>
                    </tr>
                    <tr>
                      <td>82</td>
                      <td>NEW_CHQ_BK_COMMISSION</td>
                      <td>{{$bob->NEW_CHQ_BK_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>83</td>
                      <td>PASSBOOK COMMISSION</td>
                      <td>{{$bob->PASSBOOK_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>84</td>
                      <td>CHQ_COLLECTION_COMMISSION</td>
                      <td>{{$bob->CHQ_COLLECTION_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>85</td>
                      <td>MOBILE_SEEDING_COMMISSION</td>
                      <td>{{$bob->MOBILE_SEEDING_COMMISSION}}</td>
                    </tr>
                    <tr>
                      <td>86</td>
                      <td>MONTHLY_FIXED_AMOUNT</td>
                      <td>{{$bob->MONTHLY_FIXED_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>87</td>
                      <td>MONTHLY_SUPERVISORY_CHARGES</td>
                      <td>{{$bob->MONTHLY_SUPERVISORY_CHARGES}}</td>
                    </tr>
                    <tr>
                      <td>88</td>
                      <td>MONTHLY_CALCULATED_VARIABLE</td>
                      <td>{{$bob->MONTHLY_CALCULATED_VARIABLE}}</td>
                    </tr>
                    <tr>
                      <td>89</td>
                      <td>AGENT_CREATED_BY</td>
                      <td>{{$bob->AGENT_CREATED_BY}}</td>
                    </tr>
                    <tr>
                      <td>90</td>
                      <td><b>TOTAL COMMISSION AMOUNT</b></td>
                      <td><b>{{$bob->TOTAL_COMMISSION_AMOUNT}}</b></td>
                    </tr>
                    <tr>
                      <td>91</td>
                      <td><b>BCA SHARE</b></td>
                      <td><b>{{$bob->BCA_SHARE}}</b></td>
                    </tr>
                    <tr>
                      <td>92</td>
                      <td><b>TDS</b></td>
                      <td><b>{{$bob->TDS_RATE}}</b></td>
                    </tr>
                    <tr>
                      <td>93</td>
                      <td><b>NET PAYABLE AMOUNT BCA</b></td>
                      <td><b>{{$bob->NET_PAYABLE_AMOUNT_BCA}}</b></td>
                    </tr>
                    <tr>
                      <td>94</td>
                      <td>NO_OF_WORKING_DAYS</td>
                      <td>{{$bob->NO_OF_WORKING_DAYS}}</td>
                    </tr>
                    <tr>
                      <td>95</td>
                      <td>PMJJBY COMM AMOUNT</td>
                      <td>{{$bob->PMJJBY_COMM_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>96</td>
                      <td>PMSBY COMM AMOUNT</td>
                      <td>{{$bob->PMSBY_COMM_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>97</td>
                      <td>APY COMM AMOUNT</td>
                      <td>{{$bob->APY_COMM_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>98</td>
                      <td>HALF YEARLY COMM AMOUNT</td>
                      <td>{{$bob->HALFYEARLY_COMM_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>99</td>
                      <td>ACCOPEN_AVGBAL_COMM_AMOUNT</td>
                      <td>{{$bob->ACCOPEN_AVGBAL_COMM_AMOUNT}}</td>
                    </tr>
                    <tr>
                      <td>100</td>
                      <td>MANDATORY_BCA_FLAG</td>
                      <td>{{$bob->MANDATORY_BCA_FLAG}}</td>
                    </tr>
                    <tr>
                      <td>101</td>
                      <td>AGENT TYPE</td>
                      <td>{{$bob->AGENT_TYPE}}</td>
                    </tr>
                    <tr>
                      <td>102</td>
                      <td>STARTER FLAG</td>
                      <td>{{$bob->STARTER_FLAG}}</td>
                    </tr>
                      <tr>
                      <td>103</td>
                      <td><b>STATE NAME</b></td>
                      <td><b>{{$bob->STATE_NAME}}</b></td>
                    </tr>
                    <tr>
                      <td>104</td>
                      <td>CREATED_ON</td>
                      <td>{{$bob->CREATED_ON}}</td>
                    </tr>
                     <tr>
                      <td>105</td>
                      <td>ACCOPEN BCASHARE</td>
                      <td>{{$bob->ACCOPEN_BCASHARE}}</td>
                    </tr>
                    <tr>
                      <td>106</td>
                      <td>ACCOPEN CBCSHARE</td>
                      <td>{{$bob->ACCOPEN_CBCSHARE}}</td>
                    </tr>
                    <tr>
                      <td>107</td>
                      <td>PNB 1 ENROLLMENT COUNT</td>
                      <td>{{$bob->PNB_1_ENROLLMENT_COUNT}}</td>
                    </tr>
                     <tr>
                      <td>108</td>
                      <td>PNB 1 COMMISSION AMOUNT</td>
                      <td>{{$bob->PNB_1_COMMISSION_AMOUNT}}</td>
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