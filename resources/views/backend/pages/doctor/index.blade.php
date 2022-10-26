
@extends('backend.layouts.master')

@section('title')
Doctors - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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
                    <li><span>All Doctors</span></li>
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
                    <h4 class="header-title float-left">Doctors List</h4>
                    <p class="float-right mb-2">
                         @if (Auth::guard('admin')->user()->can('doctor.create')) 
                            <a class="btn btn-primary text-white" href="{{ route('admin.doctor.create') }}">Create New Doctor</a>
                         @endif
                        
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables " style="display:grid;">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Years Of Experience</th>
                                    <th>Registration No.</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctor as $doctors)
                              <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$doctors->name}}</td>
                                <td>{{$doctors->specialization}}</td>
                                <td>{{$doctors->yearsOfExperience}}</td>
                                <td> {{$doctors->doctor_registration_no}}</td>
                                <td>
                                @if (Auth::guard('admin')->user()->can('doctor.show'))

                                    <a class="btn" data-toggle="tooltip" href="{{ route('admin.doctor.show',$doctors->id) }}"><i class="fa fa-eye"></i></a> 

                                @endif
                                @if (Auth::guard('admin')->user()->can('doctor.edit'))

                                    <a class="btn" data-toggle="tooltip" href="{{ route('admin.doctor.edit',$doctors->id) }}"><i class="fa fa-pencil"></i></a> 
                                @endif
                 

                                    <!-- <a class="btn" data-toggle="tooltip" href=""><i class="fa fa-trash"></i></a>  -->
                                    <!-- <button class="formConfirm"  data-form="#frmDelete-{{$doctors->id}}" data-title="Delete banner" data-message="Are you sure, you want to delete this ?" 
                                    <i title="Delete" style="margin-right: 0;" class="fas fa-trash" aria-hidden="true"></i>
                                    
                                        
                                        </button> -->
                                        <button class="formConfirm" data-form="#frmDelete-{{$doctors->id}}" data-title="Delete" data-message="Are you sure, you want to delete?" >
                                            <i title="Delete" style="margin-right: 0;" class="fa fa-trash" aria-hidden="true"></i>

                                        </button>

                                        <form id="frmDelete-{{ $doctors->id }}" action="{{ route('admin.doctor.destroy', $doctors->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
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

<!-- delete modal bootstrap -->
<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body">Are you sure, you want to delete ?</div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-danger col-sm-2 pull-right" id="frm_submit">Confirm</button>
        <button type="button" class="btn btn-primary col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>   
<!-- end modal -->
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script  type="text/javascript">
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
        </script>
<script>
  $(document).ready(function(){
    $('.formConfirm').on('click', function(e) {
    //alert();
        e.preventDefault();
        var el = $(this);
        // alert(el);
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html(msg)
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
  });
  $('#formConfirm').on('click', '#frm_submit', function(e) {
        var id = $(this).attr('data-form');
       // alert(id);
        $(id).submit();
  });

  });

     </script>
@endsection