

@extends('vuexy.layouts.master')
@section('title')
Admin
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        
                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                             
                                    <form action="{{ route('updaterole') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            
                                            <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permissions</h6>
                                            <div class="col-12 row">
                                                <div class="table-responsive border rounded px-1 col-6">
                                                    <h4>Bookmarkers</h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                 
                                                     


                                                        <tr>
                                                            <td> Records Bookmarkers</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_records_bookmarkers',$Allowedaccess) }}">{{ $Bookmarkers }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_records_bookmarkers',$NotAllowedaccess) }}">{{ $bookmarker_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>



                                                        <tr>
                                                            <td>Bookmarkers</td>
                                                            <td>
                                                            <div class="form-check">
                                                            <span class="badge badge-info">
                                                                <a href="{{ route('access_bookmarkersstatus',$Allowedaccess) }}">{{ $bookmarkersstatus }}</a>
                                                                </span>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_bookmarkersstatus',$NotAllowedaccess) }}">{{ $bookmarkersstatus_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bookmarkers Shop</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_bookmarkersshop_status',$Allowedaccess) }}">{{ $bookmarkersshop_status }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_bookmarkersshop_status',$NotAllowedaccess) }}">{{ $bookmarkersshop_status_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Public Lottery</h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Lottery Game</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_lottery_name',$Allowedaccess) }}">{{ $lottery_name }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_lottery_name',$NotAllowedaccess) }}">{{ $lottery_name_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                      

                                                        <tr>
                                                            <td>Records Public Lottery</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_records_public_lotery',$Allowedaccess) }}">{{ $records_public_lotery }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_records_public_lotery',$NotAllowedaccess) }}">{{ $records_public_lotery_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>



                                                       


                                                        <tr>
                                                            <td>Public Lottery Status</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_publiclotterystatus',$Allowedaccess) }}">{{ $publiclotterystatus }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_publiclotterystatus',$NotAllowedaccess) }}">{{ $publiclotterystatus_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>

                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                               
                                                <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Public Gamings </h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Public Gaming</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_publicgamingstatus',$Allowedaccess) }}">{{ $publicgamingstatus }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_publicgamingstatus',$NotAllowedaccess) }}">{{ $publicgamingstatus_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Records Public Gaming</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_records_public_gaming',$Allowedaccess) }}">{{ $records_public_gaming }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_records_public_gaming',$NotAllowedaccess) }}">{{ $records_public_gaming_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                       
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Actions</h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Edit</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_editstatus',$Allowedaccess) }}">{{ $editstatus }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_editstatus',$NotAllowedaccess) }}">{{ $editstatus_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Delete</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_deletestatus',$Allowedaccess) }}">{{ $deletestatus }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_deletestatus',$NotAllowedaccess) }}">{{ $deletestatus_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Send SMS</td> 
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_sendsms_status',$Allowedaccess) }}">{{ $sendsms_status }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_sendsms_status',$NotAllowedaccess) }}">{{ $sendsms_status_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Search</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_search',$Allowedaccess) }}">{{ $search }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_search',$NotAllowedaccess) }}">{{ $search_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>



                                                <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Companies</h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Companies</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_companies_status',$Allowedaccess) }}">{{ $companies_status }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_companies_status',$NotAllowedaccess) }}">{{ $companies_status_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Records Company</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_records_company',$Allowedaccess) }}">{{ $records_company }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_records_company',$NotAllowedaccess) }}">{{ $records_company_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                      
                                                        </tbody>
                                                    </table>
                                                </div>





                                                <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Accounts</h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>User Accounts</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_user_accounts_status',$Allowedaccess) }}">{{ $user_accounts_status }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_user_accounts_status',$NotAllowedaccess) }}">{{ $user_accounts_status_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Records Accounts</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_records_accounts',$Allowedaccess) }}">{{ $records_accounts }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_records_accounts',$NotAllowedaccess) }}">{{ $records_accounts_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                       
                                                        </tbody>
                                                    </table>
                                                </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



                                                <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Registry</h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Registry</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_access_registry',$Allowedaccess) }}">{{ $access_registry }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_access_registry',$NotAllowedaccess) }}">{{ $access_registry_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>File Registry</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_access_file_registry',$Allowedaccess) }}">{{ $access_file_registry }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_access_file_registry',$NotAllowedaccess) }}">{{ $access_file_registry_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                      


                                                        <tr>
                                                            <td>Assign Registry</td>assign_file_registry_not_allowed
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_assign_file_registry',$Allowedaccess) }}">{{ $assign_file_registry }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_assign_file_registry',$NotAllowedaccess) }}">{{ $assign_file_registry_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>



                                                        </tbody>
                                                    </table>
                                                </div>





                                                <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Task</h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Asign Task</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_assign_task',$Allowedaccess) }}">{{ $assign_task }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_assign_task',$NotAllowedaccess) }}">{{ $assign_task_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        
                                                       
                                                        </tbody>
                                                    </table>
                                                </div>






<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

									    <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Admins Roles  </h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td> Assign Companies</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_admin_assign_companies',$Allowedaccess) }}">{{ $admin_assign_companies }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_admin_assign_companies',$NotAllowedaccess) }}">{{ $admin_assign_companies_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Assign Record Entry</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_admin_assign_record_entry',$Allowedaccess) }}">{{ $admin_assign_record_entry }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_admin_assign_record_entry',$NotAllowedaccess) }}">{{ $admin_assign_record_entry_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Assign Accounts</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_admin_assign_accounts',$Allowedaccess) }}">{{ $admin_assign_accounts }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_admin_assign_accounts',$NotAllowedaccess) }}">{{ $admin_assign_accounts_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Assign Registry</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_admin_assign_registry',$Allowedaccess) }}">{{ $admin_assign_registry }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_admin_assign_registry',$NotAllowedaccess) }}">{{ $admin_assign_registry_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>			
												
												
												
												    <div class="table-responsive border rounded px-1 col-6 ">
                                                    <h4>Admins User Modules </h4>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Allowed</th>
                                                                <th>Not Allowed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td> Bookmarkers Group</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_bookmarkers_group',$Allowedaccess) }}">{{ $bookmarkers_group }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_bookmarkers_group',$NotAllowedaccess) }}">{{ $bookmarkers_group_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Public Lottery Group</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_public_lottery_group',$Allowedaccess) }}">{{ $public_lottery_group }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_public_lottery_group',$NotAllowedaccess) }}">{{ $public_lottery_group_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Public Gaming Group</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_public_gaming_group',$Allowedaccess) }}">{{ $public_gaming_group }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_public_gaming_group',$NotAllowedaccess) }}">{{ $public_gaming_group_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Actions Group</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('access_actions_group',$Allowedaccess) }}">{{ $actions_group }}</a>
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <a href="{{ route('deny_actions_group',$NotAllowedaccess) }}">{{ $actions_group_not_allowed }}</a>
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <!-- ................................................................... -->
                                            <!-- ................................................................... -->
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                Changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit account form ends -->
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->
        </div>
    </div>
</div>
@endsection

