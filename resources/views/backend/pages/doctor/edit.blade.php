
@extends('backend.layouts.master')

@section('title')
Doctors Edit - Admin Panel
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
                <h4 class="page-title pull-left">Doctors</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <!-- <li><a href="">All Blogs</a></li> -->
                    <li><span>Edit Doctors Profile</span></li>
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
                    <h4 class="header-title"> Edit Doctor Profile</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.doctor.update',$doctor->id) }}" method="post" id="form" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        @method('PUT')
                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label  for="designation">Doctor Name<span style="color:red; font-size: 18px;line-height:1">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$doctor->name}}" placeholder="Enter Doctor Name" required>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="member">Doctor Specialization<span style="color:red; font-size: 18px;line-height:1">*</span></label>
                                <input type="text" class="form-control" id="specialization" name="specialization" value="{{$doctor->specialization}}" placeholder="Enter Doctor Specialization" required>
                                
                            </div>
                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="director_name">Years Of Experience<span style="color:red; font-size: 18px;line-height:1">*</span></label>
                                <input type="text" class="form-control" id="experience" name="experience" value="{{$doctor->yearsOfExperience}}"  placeholder="Enter Years Of Experience" required>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="din_no">Language<span style="color:red; font-size: 18px;line-height:1">*</span></label>
                                <input type="text" class="form-control" id="language" name="language" value="{{$doctor->language}}"  placeholder="Enter Language" required>
                            </div>
                            
                        </div>
                     
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="Appointment_Date">Doctor Education<span style="color:red; font-size: 18px;line-height:1">*</span></label>
                                <!-- <input type="date" class="form-control" id="appointment_date" name="appointment_date" required> -->
                                <textarea id="summernote" name="education" class="form-control" value=""  placeholder="Enter Education..." required>{{$doctor->education}}</textarea> 

                            </div>
                            <div class="form-group col-md-6">
                                <label for="Resignation Date">Doctor Fee <span style="color:red; font-size: 18px;line-height:1">*</span></label>
                                <input type="text" class="form-control" id="fee" name="fee" value="{{$doctor->fees}}"  placeholder="Enter Fee" required>
                            </div>
                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Resignation Date">Doctor Registration No. <span style="color:red; font-size: 18px;line-height:1">*</span></label>
                                <input type="text" class="form-control" id="registration_no" value="{{$doctor->doctor_registration_no}}"  name="registration_no" placeholder="Enter Doctor Registration No." required>
                            </div>
                                                   
                            <div class="form-group col-md-6">

                                <label class="col-sm-3 control-label">Doctor Image <span style="color:red; font-size: 18px;line-height:1">*</span></label><br>
                         
                                <input type="file" name="image" class="GalleryImage" id="image"  />  
                                @if(isset($doctor))
                                    <img src="{{asset('/images/DoctorImage/'.$doctor->image)}}" width="60%" class="img-thumbnail">
                                @endif

                             </div>  
                        </div>
                                         
                        <div style="text-align:center;">
                        <button type="submit" class="btn btn-primary  pr-4 pl-4">Update </button>
                        <a class="btn btn-danger" href="{{url('/admin/doctor')}}">Cancel </a>
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

<script src="jquery.js"></script>
<script src="parsley.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script> -->

<script>
  $('#form').parsley();
</script>
@endsection