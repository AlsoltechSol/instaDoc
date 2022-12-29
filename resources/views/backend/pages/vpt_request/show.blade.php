
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
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>Home</a></li>>
        <li><a href="{{ route('admin.vpt_request.index') }}">Request's Details</a></li> >
        <!-- <li><a href=""></a></li> -->
        <span>{{$details->patient_detail->name}} </span>
    </ul>

    <!-- <header class="panel-heading">
            <span class="h4">Doctor Details</span>
    </header> -->
               
    <div class="container">
          
          <div id="accordion">

            <div class="card">
              <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Request Details
                    
                  </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <table id="dataTable" class="table table-details">
                        <tbody>
                        
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Patient Name</b></td>
                          <td> 
                             {{$details->patient_detail->name}}
                       
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Request For</b></td>
                          <td> 
                          {{$details->request_for}}
                    
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Expected Date</b></td>
                          <td> 
                          
                          {{\Carbon\Carbon::parse($details->expected_date)->format('d/m/Y')}}

                          </td>
                      </tr>
                     

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Destination Location</b></td>
                          <td> 
                          {{$details->destination_location}}
                         
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Status</b></td>
                          <td> 
                          {{$details->status}}
                         
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Status Update</b></td>

                          <td> 
                                <form action="{{route('admin.UpdateStatus', $details->id)}}" method="POST">
                                   @method('PUT')
                                     @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                        <!-- <input type="text" class="form-control" name="payment_amount"> -->
                                        <!-- <label for="password">Assign Roles</label> -->
                                            <select name="status" id="status" class="form-control " >
                                                <option value="">Select </option>
                                  
                                                <option value="Pending">Pending</option>
                                                <option value="Attaining">Attaining</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Cancelled">Cancelled</option>
                                  
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>

                                    </div>

                                   </form>
                          </td>
                      </tr>
                        </tbody>
                    </table>
                  </div>
            </div>
             

          
        
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