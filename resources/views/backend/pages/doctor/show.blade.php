
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<style>

</style>
    @endsection


@section('admin-content')



           

    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href=""><i class="fa fa-home"></i>Home</a></li>>
        <li><a href="">Doctor's Details</a></li> >
        <!-- <li><a href=""></a></li> -->
        <span>{{$details->name}} </span>
    </ul>

    <header class="panel-heading">
            <span class="h4">Doctor Details</span>
    </header>
               
    <div class="container">
          
          <div id="accordion">

            <div class="card">
              <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Doctor Details
                    
                  </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <table id="dataTable" class="table table-details">
                        <tbody>
                        
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Doctor Name</b></td>
                          <td> 
                            {{$details->name}}
                       
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Doctor Specialization</b></td>
                          <td> 
                          {{$details->specialization}}
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Years of Experience</b></td>
                          <td> 
                          {{$details->yearsOfExperience}}

                          </td>
                      </tr>
                     
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Education</b></td>
                          <td> 
                      
                          {{$details->education}}

                          </td>
                      </tr>

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Language</b></td>
                          <td> 
                          {{$details->language}}
                       

                        
                         
                          </td>
                      </tr>

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Doctor Fee</b></td>
                          <td> 
                          {{$details->fees}}
                      
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"> <b>Doctor Registration No.</b></td>
                          <td> 
                          {{$details->doctor_registration_no}}
                      
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Doctor Photo</b></td>
                          <td> 
                          @if(isset($details))
                                    <img src="{{asset('/images/DoctorImage/'.$details->image)}}" width="50%" class="img-thumbnail">
                            @endif
                          </td>
                      </tr>
                        </tbody>
                    </table>
                  </div>
            </div>
             
            <footer class="panel-footer text-right bg-light lter" style="z-index: 100;margin: 1.25rem 0 bottom: -0.75rem;position: absolute; bottom: 2px; right: 5px;">
              <a href="{{url('/admin/doctor')}}" class="btn btn-danger">Back</a>
          </footer>
          
        </div>
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

        
        $('#dataTable').dataTable( {
  stateSave: true,
  stateDuration:-1
} );

       
     </script>
@endsection