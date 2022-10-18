 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <!-- doctor -->

                    @if ($usr->can('doctor.create') || $usr->can('doctor.view') ||  $usr->can('doctor.edit') ||  $usr->can('doctor.delete'))
                    
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user-md"></i><span>
                            Doctors
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.doctor.create') || Route::is('admin.doctor.index') || Route::is('admin.doctor.edit') || Route::is('admin.doctor.show') ? 'in' : '' }}">
                            
                        @if ($usr->can('doctor.view'))    
                         <li class="{{ Route::is('admin.doctor.index')  || Route::is('admin.doctor.edit') || Route::is('admin.doctor.show') ? 'active' : '' }}"><a href="{{ route('admin.doctor.index') }}">All Doctors</a></li>
                        @endif  
                        
                        @if ($usr->can('doctor.create'))    
                        <li class="{{ Route::is('admin.doctor.create')  ? 'active' : '' }}"><a href="{{ route('admin.doctor.create') }}">Create Doctor</a></li>
                        @endif  
                            
                        </ul>
                    </li>
                    @endif
                    
                    <!-- end doctor -->

                      <!-- patient -->

                                        
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-plus-square"></i><span>
                            Patient
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.patient.create') || Route::is('admin.patient.index') || Route::is('admin.patient.edit') || Route::is('admin.patient.show') ? 'in' : '' }}">
                            
                   
                         <li class="{{ Route::is('admin.patient.index')  || Route::is('admin.patient.edit') || Route::is('admin.patient.show') ? 'active' : '' }}"><a href="{{ route('admin.patient.index') }}">All Patients</a></li>
                         <li class="{{ Route::is('admin.patient.index')  || Route::is('admin.patient.edit') || Route::is('admin.patient.show') ? 'active' : '' }}"><a href="">Order Medicines</a></li>
                         <li class="{{ Route::is('admin.medical_record.index')  || Route::is('admin.medical_record.edit') || Route::is('admin.medical_record.show') ? 'active' : '' }}"><a href="{{ route('admin.medical_record.index') }}">Medical Records</a></li>
                        
                         <li class="{{ Route::is('admin.patient.index')  || Route::is('admin.patient.edit') || Route::is('admin.patient.show') ? 'active' : '' }}"><a href="">Appointments</a></li>
                                           
                        </ul>
                    </li>
        
                    
                    <!-- end patient -->

                    <!-- visa/passport/travel section -->
                    <li>
                        <a href="{{ route('admin.vpt_request.index') }}" aria-expanded="true"><i class="fa fa-cc-visa"></i><span>
                            Visa/Passport/Travel Request
                        </span></a>
                       
                    </li>
                    <!-- end visa/passport/travel section -->

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->