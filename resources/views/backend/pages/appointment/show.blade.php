
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

<style>

</style>
    @endsection


@section('admin-content')



           

    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>Home</a></li>>
        <li><a href="{{ route('admin.appointment.index') }}">Appointment's Details</a></li> >
        <!-- <li><a href=""></a></li> -->
        <span> {{$appointment_detail->patient_details_appoint->name}}</span>
    </ul>

    <header class="panel-heading">
            <span class="h4">Appointment Details</span>
    </header>
               
    <div class="container">
          
          <div id="accordion">

            <div class="card">
              <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                  Appointment Details
                    
                  </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <table id="dataTable" class="table table-details">
                        <tbody>
                        
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Patient Name</b></td>
                          <td> 
                          {{$appointment_detail->patient_details_appoint->name}}
                       
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Doctor Allocated</b></td>
                          <td> 
                          @isset($appoint->doctor_details_appoint->name)
                                {{$appoint->doctor_details_appoint->name}}
                          @else
                                Doctor Not Available                   
                          @endisset
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Slot Date</b></td>
                          <td> 
                          @isset($appointment_detail->slot_details_appoint->date)
                                {{$appointment_detail->slot_details_appoint->date}}
                          @else
                                 Not Available                   
                          @endisset
                          
                          </td>
                      </tr>
                     
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Slot Time</b></td>
                          <td> 

                          

                          </td>
                      </tr>

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>Patient Mobile No.</b></td>
                          <td> 
                          {{$appointment_detail->patient_details_appoint->contact_no}}
                              
                          </td>
                      </tr>

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Patient Email ID</b></td>
                          <td> 
                          {{$appointment_detail->patient_details_appoint->email_id}}
                          
                      
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Payment Status</b></td>
                          <td> 
                          {{$appointment_detail->payment_status}}
                       
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Payment Mode</b></td>
                          <td> 
                          {{$appointment_detail->payment_mode}}
                            
                       
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Appointment Status</b></td>
                          <td> 
                          {{$appointment_detail->appointment_status}}
                          
                          </td>
                      </tr>
                        </tbody>
                    </table>
                  </div>
            </div>

            <div id="accordion">

            <div class="card">
              <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                    Update Payment Status & Mode                   
                  </a>
              </div>
              <div id="collapseTwo" class="collapse " data-parent="#accordion">
                  <div class="card-body">
                    <table id="dataTable" class="table table-details">
                        <tbody>
                        
                     
                      <tr>
                          <td class="ft-200" style="width: 250px;"><b>  Payment Status</b></td>
                          <td> 
                          <form action="{{route('admin.updateStatus', $appointment_detail->id)}}" method="POST">
                                   @method('PUT')
                                     @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                       
                                            <select name="payment_status" id="payment_status" class="form-control " >
                                                <!-- <option value="">Select </option> -->
                                  
                                                <option value="Pending" {{$appointment_detail->payment_status=='Pending'?'selected':''}}>Pending</option>
                                                <option value="Success" {{$appointment_detail->payment_status=='Success'?'selected':''}}>Success</option>
                                                <option value="Failed" {{$appointment_detail->payment_status=='Failed'?'selected':''}}>Failed</option>                                            
                                  
                                            </select>
                                        </div>

                                    </div>
                       
                          </td>
                      </tr>

                      <tr>
                          <td class="ft-200" style="width: 250px;"><b> Payment Mode</b></td>
                          <td> 
                          <div class="form-row">

                                        <div class="form-group col-md-4">

                                            <select name="payment_mode" id="payment_mode" class="form-control " >
                                                <!-- <option value="">Select </option> -->
                                  
                                                <option value="Online" {{$appointment_detail->payment_mode=='Online'?'selected':''}}>Online</option>
                                                <option value="Cash" {{$appointment_detail->payment_mode=='Cash'?'selected':''}}>Cash</option>
                                                <option value="Cheque" {{$appointment_detail->payment_mode=='Cheque'?'selected':''}}>Cheque</option>
                                                <!-- <option value="Cancelled">Cancelled</option> -->
                                  
                                            </select>
                                        </div>

                                    </div>
                            
                       
                          </td>
                      </tr>
                      <tr>
                          <td class="ft-200" style="width: 250px;"></td>
                          <td> 
                          
                          <button type="submit" class="btn btn-primary">Update</button>
                          
                          </td>
                      </tr>
                    </form>
                     
                    
                        </tbody>
                    </table>
                  </div>
              </div>
            </div>
            </div>
            
             
            <footer class="panel-footer text-right bg-light lter" style="z-index: 100;margin: 1.25rem 0 bottom: -0.75rem;position: absolute; bottom: 2px; right: 5px;">
              <a href="{{url('/admin/appointment')}}" class="btn btn-danger">Back</a>
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