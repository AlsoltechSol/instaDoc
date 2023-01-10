
@extends('backend.layouts.master')

@section('title')
Test Center Edit - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')



<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Test Centert</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <!-- <li><a href="">All Blogs</a></li> -->
                   
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
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"> Update Test Center </h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.lab_centers.update', $labCenter->id) }}" method="POST" id="form" data-parsley-validate>
                        @csrf
                        @method('put')
                        <div class="form-group row">
                              
                            
                                <div class="col-sm-6">
                                    <label for="">Name</label>
                                <input name="lab_name" type="text" value="{{$labCenter->lab_name}}" class="form-control" id="s_date" required>
                                
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Location</label>
                                    <input name="lab_address" type="text" class="form-control" value="{{$labCenter->lab_address}}" id="s_date" required>
                                   
                                </div>
                         </div>

                         <div class="form-group row">
                              
                            
                            <div class="col-sm-6">
                                <label for="">Email</label>
                            <input name="emailaddress" type="text" class="form-control" id="s_date" value="{{$labCenter->emailaddress}}" required>
                            
                            </div>
                            <div class="col-sm-6">
                                <label for="">Phone</label>
                                <input name="contactno" type="text" class="form-control" id="s_date" value="{{$labCenter->contactno}}" required>
                               
                            </div>
                         </div>

                         <div class="form-group row">
                              
                            <div class="col-sm-6">
                                <label for="">Contact Person</label>
                            <input name="contactperson" type="text" class="form-control" id="s_date" value="{{$labCenter->contactperson}}" required>
                            
                            </div>
                            <div class="col-sm-6">
                                <label for="">Registration Number</label>
                                <input name="registrationno" type="text" class="form-control" id="s_date" value="{{$labCenter->registrationno}}" required>
                               
                            </div>
                         </div>

                        
                        
      
                                         
                        <div style="text-align:center;">
                        <button type="submit" class="btn btn-primary  pr-4 pl-4">Save </button>
                        <a class="btn btn-danger" href="">Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="parsley.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script> -->

<script>
  $('#form').parsley();
</script>
<script>
    $(document).ready(function(){
        $("#s_date").change(function(){
            let dt=$(this).val();
           
            const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

            const d = new Date(dt);
            let day = weekday[d.getDay()];
        
            document.getElementById("weekday1").value = day;
        })
    })
</script>

@endsection