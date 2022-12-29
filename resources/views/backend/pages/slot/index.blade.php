
@extends('backend.layouts.master')

@section('title')
Slot - Admin Panel
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
                <h4 class="page-title pull-left">Slot</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Slots</span></li>
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
                    <h4 class="header-title float-left">Slot List</h4>
                    <p class="float-right mb-2">
                    
                            <a class="btn btn-primary text-white" href="{{ route('admin.slot.create') }}"> New Slot</a>
                         
                        
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th> Date</th>
                                    <th> Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slot as $slots)
                                <tr>
                                   <td>{{$loop->index+1}}</td>
                                   <td>{{ Carbon\Carbon::parse($slots->date)->format('d-m-Y') }}</td> 
                                   <td>{{$slots->weekday}}</td> 
                                   <td>{{$slots->start_time}}</td> 
                                   <td>{{$slots->end_time}}</td> 
                                    
                                   <td>
                                   <a class="btn" data-toggle="tooltip" href="{{ route('admin.slot.edit',$slots->id) }}"><i class="fa fa-pencil"></i></a> 

                                   <a class="btn" href="{{ route('admin.slot.destroy', $slots->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $slots->id }}').submit();">
                                        <i title="Delete" style="margin-right: 0;" class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                        <form id="delete-form-{{ $slots->id }}" action="{{ route('admin.slot.destroy', $slots->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>

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

     </script>

@endsection