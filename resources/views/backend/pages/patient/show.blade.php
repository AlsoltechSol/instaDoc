
@extends('backend.layouts.master')

@section('title')
Patient - Admin Panel
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
        <li><a href="">Patient's Details</a></li> >
        <!-- <li><a href=""></a></li> -->
        <span>{{$patient_detail->name}} </span>
    </ul>

    <header class="panel-heading">
            <span class="h4">Patient Details</span>
    </header>
               
    <div class="container">
          
          <div id="accordion">

            <div class="card">
              <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Patient Details
                    
                  </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <table id="dataTable" class="table table-details">
                        <tbody>
                        
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Patient Name</b></td>
                          <td> 
                          {{$patient_detail->name}}
                       
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Contact Number</b></td>
                          <td> 
                          {{$patient_detail->contact_no}}
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Date Of Birth</b></td>
                          <td> 
                          {{$patient_detail->dateOfBirth}}

                          </td>
                      </tr>
                     
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Age</b></td>
                          <td>
                            @php 
                          $dateOfBirth = ($patient_detail->dateOfBirth);

                            $age = \Carbon\Carbon::parse($dateOfBirth)->diff(\Carbon\Carbon::now())->format('%y years');
                            echo $age;
                          @endphp
                          </td>
                      </tr>

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Gender</b></td>
                          <td>
                          {{$patient_detail->gender}}   
                          </td>
                      </tr>

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Email</b></td>
                          <td> 
                          
                          {{$patient_detail->email_id}}
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"> <b>Address</b></td>
                          <td> 
                          {{$patient_detail->address}}
                      
                          </td>
                      </tr>
                      <!-- <tr>
                          <td class="ft-200" style="width: 250px;"><b> Doctor Photo</b></td>
                          <td> 

                      </tr> -->
                        </tbody>
                    </table>
                  </div>
            </div>
             
            <footer class="panel-footer text-right bg-light lter" style="z-index: 100;margin: 1.25rem 0 bottom: -0.75rem;position: absolute; bottom: 2px; right: 5px;">
              <a href="{{url('/admin/patient')}}" class="btn btn-danger">Back</a>
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