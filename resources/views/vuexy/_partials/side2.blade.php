
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">BCLB</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active"><a href="{{ route('home')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Dashboard</span></a>
                        </li>


                        @if ( Auth::user()->user_accounts_status == 'Allowed' )                
                        <li class=" nav-item"><a href="{{ route('accountsregistryuseradmin')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Accounts</span></a>
                </li>
                @else  @endif


                        @if ( Auth::user()->records_bookmarkers_r == 'Allowed' )                
                        <li class=" nav-item"><a href="{{ route('bookmarkers.adminindex')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Bookmarkers</span></a>
                </li>
                @else   
                                    @endif
                                    @if ( Auth::user()->publiclotterystatus == 'Allowed' )
                        <li class=" nav-item"><a href="{{ route('adminuserpubliclottery')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Public Lottery </span></a>
                </li>
                @else    @endif

   
                                    @if ( Auth::user()->publicgamingstatus == 'Allowed' )
                <li class=" nav-item"><a href="{{ route('publicgamingadminindex')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Public Gaming</span></a>
                </li>
                @else   
                                    @endif

 
                                  
       


    @if ( Auth::user()->companies_status == 'Allowed' )

    <li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">Company</span></a>
                    <ul class="menu-content">
              
                    @if ( Auth::user()->bookmarkers_companies_status == 'Allowed' )
      <li class=" nav-item"><a href="{{ route('bookmarkersadminusercompany')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Bookmarkers</span></a>
                </li>
                @else  @endif
                

                @if ( Auth::user()->public_lottery_companies_status == 'Allowed' )

                <li class=" nav-item"><a href="{{ route('publiclotteryadminusercompany')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Public Lottery</span></a>
                </li>
                @else  @endif
                @if ( Auth::user()->public_gaming_companies_status == 'Allowed' )

                <li class=" nav-item"><a href="{{ route('publicgamingadminusercompany')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Public Gaming</span></a>
                </li>
                @else  @endif
                <!-- <li class=" nav-item"><a href="{{ route('setting.backup')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Back Up Database</span></a>
                </li> -->

</ul>  </li>
   

                @else  @endif
           







                @if ( Auth::user()->access_registry == 'Allowed' )       

<li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">Registry Entry</span></a>
                <ul class="menu-content">
          
                @if ( Auth::user()->access_file_registry == 'Allowed' )
  <li class=" nav-item"><a href="{{ route('registryadmin')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Registry</span></a>
            </li>
            @else  @endif
            @if ( Auth::user()->assign_file_registry == 'Allowed' )

            <li class=" nav-item"><a href="{{ route('registryfilingdmin')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Filing</span></a>
            </li>
            @else  @endif
            @if ( Auth::user()->assign_task == 'Allowed' )

            <li class=" nav-item"><a href="{{ route('registryassignadmin')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Assign</span></a>
            </li>
            @else  @endif
            <!-- <li class=" nav-item"><a href="{{ route('setting.backup')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Back Up Database</span></a>
            </li> -->

</ul>  </li>
 

            @else  @endif 
       





<!-- <li><a href="{{ route('calender')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Calender</span></a>
</li>  -->
<li><a href="{{ route('taskindex')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Task</span></a>
</li> 

<li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">Account Setting</span></a>
                    <ul class="menu-content">
              
              
      <li class=" nav-item"><a href="{{ route('users_admin')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Users</span></a>
                </li>
                <!-- <li class=" nav-item"><a href="{{ route('viewassignedusersroles')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Users Allocation</span></a>
                </li> -->
                <!-- <li class=" nav-item"><a href="{{ route('setting.backup')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Back Up Database</span></a>
                </li> -->

                @if ( Auth::user()->sendsms_status == 'Allowed' )
              
                <li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">SMS </span></a>
                    <ul class="menu-content"> 
                <li><a href="{{ route('sendsmsuseradmin')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Send SMS To Company</span></a>
                </li>
                <li><a href="{{ route('sendsmstocontactuseradmin')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Send SMS To Contact</span></a>
                </li>
                <li><a href="{{ route('sendbulksmsuseradmin')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Bulk SMS</span></a>
                </li>  </li>
                </ul>
                </li>
                @else   
                                    @endif   

</li></ul></li>


                                    <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Reports</span></a>
                <ul class="menu-content"> 
                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Companies</span></a> -->
              

                <!-- <li><a href="{{ route('company.bookmarkers_company_report')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Companies Status</span></a>
                        </li> -->

                        @if ( Auth::user()->user_accounts_status == 'Allowed' )                
                    
               
                        <li><a href="{{ route('company.accountsadmins')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Finance Report</span></a>
                        </li>
                        @else   
                                    @endif
                <!-- <ul class="menu-content"> 
                <li><a href="{{ route('company.bookmarkers_company_report')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Bookmarkers </span></a>
                        </li>
                        <li><a href="{{ route('company.publiclottery_company_report')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Public Lottery</span></a>
                        </li>
                        <li><a href="{{ route('company.publicgaming_company_report')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Public Gaming </span></a>
                        </li>
                        </ul> -->

                        <!-- <li><a href="{{ route('company.bookmarkers_shop_report')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Shop </span></a>
                        </li>
                        <li><a href="{{ route('lotterynumbershop')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Lottery Number </span></a>
                        </li> -->

                       
            @if ( Auth::user()->access_registry == 'Allowed' )

                        <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Registry Reports</span></a>
                <ul class="menu-content"> 

                        <li><a href="{{ route('reports.registryuseradmin')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Registry</span></a>
                        </li>
                        <li><a href="{{ route('reports.filinguseradmin')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Filing</span></a>
                        </li>
                        <li><a href="{{ route('reports.taskinguseradmin')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Tasking</span></a>
                        </li>
                    </ul>
                </li>         
                @else  @endif
                @if ( Auth::user()->bookmarkersstatus == 'Allowed' )
                        <li><a href="{{ route('reports')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Bookmarkers Report</span></a>
                        </li>
                        @else  @endif
                        @if ( Auth::user()->publiclotterystatus == 'Allowed' )
                        <li><a href="{{ route('indexpubliclottery')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Public Lottery Report</span></a>
                        </li>
                        @else  @endif
                        @if ( Auth::user()->publicgamingstatus == 'Allowed' )
                        <li><a href="{{ route('indexpublicgaming')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Public Gaming Report</span></a>
                        </li>
                
                         @else  @endif




                        <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Graphical Reports</span></a>
                <ul class="menu-content"> 
                @if ( Auth::user()->publicgamingstatus == 'Allowed' )
                        <li><a href="{{ route('reports.publicgamingGGr')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Public Gaming GGR</span></a>
                        </li>
                        @else  @endif
                        @if ( Auth::user()->publiclotterystatus == 'Allowed' )
                        <li><a href="{{ route('reports.publiclotteryGGr')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Public Lottery GGR</span></a>
                        </li>
                        @else  @endif
                        @if ( Auth::user()->bookmarkersstatus == 'Allowed' )
                        <li><a href="{{ route('reports.company-ggr')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Bookmarkers GGR</span></a>
                        </li>
                        @else  @endif
                    </ul>
                </li>  
                </ul>
                </li>  




</ul></div></div>
