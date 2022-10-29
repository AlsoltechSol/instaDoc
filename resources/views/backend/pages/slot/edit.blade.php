
@extends('backend.layouts.master')

@section('title')
Slot Edit - Admin Panel
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
                <h4 class="page-title pull-left">Doctors  Slot</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <!-- <li><a href="">All Blogs</a></li> -->
                    <li><span> Slot</span></li>
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
                    <h4 class="header-title"> Edit Slot </h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.slot.update',$slot->id) }}" method="POST" id="form" data-parsley-validate>
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                                <label class="col-sm-4 col-form-label" style="text-align: right" for="" ><b>  Date </b><span style="color:red; font-size: 18px;line-height:1;">*</span></label>
                            
                                <div class="col-sm-6">
                                <input type="date" class="form-control" id="s_date" name="date" value="{{$slot->date}}" required>
                                
                                </div>
                         </div>

                         <div class="form-group row">
                                <label class="col-sm-4 col-form-label" style="text-align: right" for="" ><b>  Weekday </b><span style="color:red; font-size: 18px;line-height:1;">*</span></label>
                            
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="weekday1" name="weekday" value="{{$slot->weekday}}" required>
                                
                                </div>
                         </div>

                         <div class="form-group row">
                                <label class="col-sm-4 col-form-label" style="text-align: right" for="" ><b>  Start Time </b><span style="color:red; font-size: 18px;line-height:1;">*</span></label>
                            
                                <div class="col-sm-6">
                                <input type="time" class="form-control" id="start_time" name="start_time" value="{{$slot->start_time}}" required>
                                
                                </div>
                         </div>

                         <div class="form-group row">
                                <label class="col-sm-4 col-form-label" style="text-align: right" for="" ><b>  End Time </b><span style="color:red; font-size: 18px;line-height:1;">*</span></label>
                            
                                <div class="col-sm-6">
                                <input type="time" class="form-control" id="end_time" name="end_time" value="{{$slot->end_time}}" required>
                                
                                </div>
                         </div>
                        
      
                                         
                        <div style="text-align:center;">
                        <button type="submit" class="btn btn-primary  pr-4 pl-4">Update </button>
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