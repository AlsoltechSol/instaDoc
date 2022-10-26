
@extends('backend.layouts.master')

@section('title')
Appointment - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
<style>
    .form-control{
        padding: 0 0 0 0;
    }
</style>

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Appointment</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Appointment</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">

      <!-- search -->
<div class="col-12 mt-5">

<div class="card">
    <div class="card-body">
        <h4 class="header-title">Search</h4>
    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="search_status"><b> Appointment Status:</b></label>
                    <select name="search_status" id="search_status" class="form-control" >
                        <option value="all">All</option>
                        <option value="Active">Active</option>
                        <option value="Cancel">Cancel</option>
                        
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="pay_status"><b> Payment Status:</b></label>
                    <select name="pay_status" id="pay_status" class="form-control" >
                        <option value="all">All</option>
                        <option value="Success">Success</option>
                        <option value="Pending">Pending</option>
                        <option value="Failed">Failed</option>
                        
                    </select>
                </div>
                          
            </div>

    </div>
</div>
</div>
<!-- end search -->
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Appointment List</h4>
                   
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Allocated</th>
                                    <th>Slots</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach($appointment as $appoint)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$appoint->patient_details_appoint->name}}</td>
                                    <td>@isset($appoint->doctor_details_appoint->name)
                                             {{$appoint->doctor_details_appoint->name}}
                                        @else
                                        Doctor Not Available                   
                                        @endisset
                                    </td>
                                    <td></td>
                                    <td>{{$appoint->payment_status}}</td>
                                    <td>{{$appoint->appointment_status}}</td>
                                    <td>
                                    <a class="btn" data-toggle="tooltip" href="{{ route('admin.appointment.show',$appoint->id) }}"><i class="fa fa-eye"></i></a> 

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

        $(document).ready(function(){
        $("#search_status").change(function() {
        $("#search_status option:selected").each(function() {
        var value = $(this).text().toLowerCase();
        console.log(value);
        if(value == "all"){
            value = "";
            $("#myTable tr").filter(function() {
        $(this).toggle($(this.children[5]).text().toLowerCase().indexOf(value) > -1)
            });
        } else {
            $("#myTable tr").filter(function() {
        $(this).toggle($(this.children[5]).text().toLowerCase().indexOf(value) > -1)
        });
        
    }
    });
    
    
  });

  $("#pay_status").change(function() {
        $("#pay_status option:selected").each(function() {
        var value = $(this).text().toLowerCase();
        console.log(value);
        if(value == "all"){
            value = "";
            $("#myTable tr").filter(function() {
        $(this).toggle($(this.children[4]).text().toLowerCase().indexOf(value) > -1)
            });
        } else {
            $("#myTable tr").filter(function() {
        $(this).toggle($(this.children[4]).text().toLowerCase().indexOf(value) > -1)
        });
        
    }
    });
    
    
  });
});


     </script>
@endsection