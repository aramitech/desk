

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
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                        <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                                        </a> -->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                    <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Activity Logs</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <a class="mr-2 my-25" href="#">
                                        <img src="{{ asset('assets/images/about-icon-01.png')}}" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
                                        </a>
                                        <div class="media-body mt-50">
                                            <h4 class="media-heading">   
                                                @foreach($users as $user)
                                                {{ $user->name }}
                                                @endforeach
                                            </h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <!-- <a href="#" class="btn btn-primary d-none d-sm-block mr-75">Change</a> -->
                                                <a href="#" class="btn btn-primary d-block d-sm-none mr-75"><i class="feather icon-edit-1"></i></a>
                                                <!-- <a href="#" class="btn btn-outline-danger d-none d-sm-block">Remove</a> -->
                                                <a href="#" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    @foreach($users as $user)
                                    </h4>
                                    <form action="{{ route('updaterole') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="hidden" class="form-control" name="id" placeholder="ID " value="{{ $user->id }}">
                                                        <label>
                                                            <h4>Personal File No</h4>
                                                        </label>
                                                        <input type="text" class="form-control" placeholder="Username" value="{{ $user->perspnal_file_no }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>
                                                            <h4>Name</h4>
                                                        </label>
                                                        <input type="text" class="form-control" placeholder="Name" value="{{ $user->name }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>
                                                            <h4>E-mail</h4>
                                                        </label>
                                                        <input type="email" class="form-control" placeholder="Email" value="{{ $user->email }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>
                                                        <h4>Status</h4>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="Account Status" value="{{ $user->account_status }}" >
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <h4>Section</h4>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="Section" value="{{ $user->section }}" >
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <h4>Phone</h4>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="Phone" value="{{ $user->phone }}" >
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="table-responsive border rounded px-1 ">
                                                    <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission</h6>
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
                                                                <input type="radio" name="companies_status" {{ $user->companies_status == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="companies_status" {{ $user->companies_status == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" >    
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Public Gaming</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="publicgamingstatus" {{ $user->publicgamingstatus == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="publicgamingstatus" {{ $user->publicgamingstatus == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" >
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bookmarkers</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="bookmarkersstatus" {{ $user->bookmarkersstatus == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="publiclotterystatus" {{ $user->publiclotterystatus == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bookmarkers Shop</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="bookmarkersshop_status" {{ $user->bookmarkersshop_status == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="bookmarkersshop_status" {{ $user->bookmarkersshop_status == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" > 
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lottery Name</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="lottery_name" {{ $user->lottery_name == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="lottery_name" {{ $user->lottery_name == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" > 
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Records Accounts</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_accounts" {{ $user->records_accounts == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_accounts" {{ $user->records_accounts == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" > 
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>User Accounts</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="user_accounts_status" {{ $user->user_accounts_status == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="user_accounts_status" {{ $user->user_accounts_status == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" > 
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Edit</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="editstatus" {{ $user->editstatus == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="editstatus" {{ $user->editstatus == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" > 
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Delete</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="deletestatus" {{ $user->deletestatus == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="deletestatus" {{ $user->deletestatus == 'NotAllowed' ? 'checked' : '' }}  value="NotAllowed" class="" >
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Send SMS</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="sendsms_status" {{ $user->sendsms_status == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="sendsms_status" {{ $user->sendsms_status == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" >
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Search</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="search" {{ $user->search == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="search" {{ $user->search == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" >
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Records Bookmarkers</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_bookmarkers" {{ $user->records_bookmarkers == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" > 
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_bookmarkers" {{ $user->records_bookmarkers == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" > 
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Records Public Gaming</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_public_gaming" {{ $user->records_public_gaming == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" > 
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_public_gaming" {{ $user->records_public_gaming == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" > 
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Records Public Lottery</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_public_lotery" {{ $user->records_public_lotery == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" > 
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_public_lotery" {{ $user->records_public_lotery == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" >
                                                                <label class="form-check-label" for="admin-write"></label>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Records Company</td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_company" {{ $user->records_company == 'Allowed' ? 'checked' : '' }} value="Allowed" class="" >
                                                                <label class="form-check-label" for="admin-read"></label>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="form-check">
                                                                <input type="radio" name="records_company" {{ $user->records_company == 'NotAllowed' ? 'checked' : '' }} value="NotAllowed" class="" >
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
                                    @endforeach
                                    <!-- users edit account form ends -->
                                </div>
                                <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form novalidate>
                                        <div class="row mt-1">
                                            <div class="col-12 col-sm-6">
                                                <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Information</h5>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Birth date</label>
                                                                <input type="text" class="form-control birthdate-picker" required placeholder="Birth date" data-validation-required-message="This birthdate field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Mobile</label>
                                                        <input type="text" class="form-control" value="&#43;6595895857" placeholder="Mobile number here..." data-validation-required-message="This mobile number is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" required placeholder="Website here..." value="https://rowboat.com/insititious/Angelo" data-validation-required-message="This Website field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Languages</label>
                                                    <select class="form-control" id="users-language-select2" multiple="multiple">
                                                        <option value="English" selected>English</option>
                                                        <option value="Spanish">Spanish</option>
                                                        <option value="French">French</option>
                                                        <option value="Russian">Russian</option>
                                                        <option value="German">German</option>
                                                        <option value="Arabic" selected>Arabic</option>
                                                        <option value="Sanskrit">Sanskrit</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio" checked value="false">
                                                                    <span class="vs-radio">
                                                                    <span class="vs-radio--border"></span>
                                                                    <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    Male
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio" value="false">
                                                                    <span class="vs-radio">
                                                                    <span class="vs-radio--border"></span>
                                                                    <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    Female
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio" value="false">
                                                                    <span class="vs-radio">
                                                                    <span class="vs-radio--border"></span>
                                                                    <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    Other
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="form-group">
                                                    <label>Contact Options</label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" checked name="customCheck1" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">Email</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" checked name="customCheck2" id="customCheck2">
                                                                    <label class="custom-control-label" for="customCheck2">Message</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="customCheck3" id="customCheck3">
                                                                    <label class="custom-control-label" for="customCheck3">Phone</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Address</h5>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Address Line 1</label>
                                                        <input type="text" class="form-control" value="A-65, Belvedere Streets" required placeholder="Address Line 1" data-validation-required-message="This Address field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Address Line 2</label>
                                                        <input type="text" class="form-control" required placeholder="Address Line 2" data-validation-required-message="This Address field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Postcode</label>
                                                        <input type="text" class="form-control" required placeholder="postcode" value="1868" data-validation-required-message="This Postcode field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" required value="New York" data-validation-required-message="This Time Zone field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>State</label>
                                                        <input type="text" class="form-control" required value="New York" data-validation-required-message="This Time Zone field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control" required value="United Kingdom" data-validation-required-message="This Time Zone field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                Changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                                <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                    <!-- users edit socail form start -->
                                    <form novalidate>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <h4 class="media-heading">   
                                                    Activity Logs For:
                                                    @foreach($users as $user)
                                                    {{ $user->name }}
                                                    @endforeach
                                                </h4>
                                                <div class="card-body card-dashboard">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered complex-headers">
                                                            <thead>
                                                                <tr>
                                                                    <th class="table-plus">#</th>
                                                                    <th>audit Module</th>
                                                                    <th>Name</th>
                                                                    <th>Audit Activity</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($auditLogs as $auditLog)
                                                                <tr>
                                                                    <td>{{ $auditLog->audit_log_id }}</td>
                                                                    <td>{{ $auditLog->audit_module }}</td>
                                                                    <td > @if($auditLog->userlogs) 
                                                                        {{  $auditLog->userlogs->name }}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $auditLog->audit_activity }}</td>
                                                                    <td>{{ $auditLog->created_at }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th class="table-plus">#</th>
                                                                    <th>Module</th>
                                                                    <th>Name</th>
                                                                    <th>Audit Activity</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <!-- <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                    Changes</button> -->
                                                <!-- <button type="reset" class="btn btn-outline-warning">Reset</button> -->
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit socail form ends -->
                                </div>
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

