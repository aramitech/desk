
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
            <li class="active"><a href="{{ route('admin-master')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Dashboard</span></a>
                        </li>
         
                        <li class=" nav-item"><a href="{{ route('accounts')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Accounts Entry </span></a>
                </li>

                <li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">Companies Entry</span></a>
                    <ul class="menu-content">
                <li class=" nav-item"><a href="{{ route('company.bookmarkers','BookMarkers')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">BookMarkers</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('company.publiclottery','PublicGaming')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Public Lottery</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('company.publicgaming','PublicLoottery')}}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Public Gaming</span></a>
                </li>
                </ul>
                </li>

                <li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">Records Entry</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('bookmarkers')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">BookMarkers</span></a>
                        </li>
                        <li><a href="{{ route('publiclottery')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Public Lottery</span></a>
                        </li>
                        <li><a href="{{ route('publicgaming')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">Public Gaming </span></a>
                        </li>
                     
                    </ul>
                </li>


         







                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Reports</span></a>
                <ul class="menu-content"> 
                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Companies</span></a> -->
              

                <li><a href="{{ route('company.bookmarkers_company_report')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Companies Status</span></a>
                        </li>

                        <li><a href="{{ route('company.accounts')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Finance Report</span></a>
                        </li>
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

                            
         
                        <li><a href="{{ route('reports')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Bookmarkers Report</span></a>
                        </li>
                        <li><a href="{{ route('indexpubliclottery')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Public Lottery Report</span></a>
                        </li>
                        <li><a href="{{ route('indexpublicgaming')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Public Gaming Report</span></a>
                        </li>
                

                        <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Graphical Reports</span></a>
                <ul class="menu-content"> 

                        <li><a href="{{ route('reports.publicgamingGGr')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Public Gaming GGR</span></a>
                        </li>
                        <li><a href="{{ route('reports.publiclotteryGGr')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Public Lottery GGR</span></a>
                        </li>
                        <li><a href="{{ route('reports.company-ggr')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Bookmarkers GGR</span></a>
                        </li>
                    </ul>
                </li>  
                </ul>
                </li>  
                
   
                <li><a href="{{ route('useractivitylogs')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Activity Logs</span></a>
</li>    



<!-- <li><a href="{{ route('calender')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Calender</span></a>
</li>  -->
<li><a href="{{ route('todo')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Task</span></a>
</li> 

<li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">Account Setting</span></a>
                    <ul class="menu-content">
              
              
                    <li><a href="{{ route('accountsetting',Auth::guard('admin')->user()->admin_id)}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">My Account </span></a>
</li>        <li class=" nav-item"><a href="{{ route('users')}}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Users</span></a>
                </li>

              
                <li class=" nav-item"><a href="#"><i class="feather icon-book"></i><span class="menu-title" data-i18n="Ecommerce">SMS </span></a>
                    <ul class="menu-content"> 
                <li><a href="{{ route('sendsms')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Send SMS To Company</span></a>
                </li>
                <li><a href="{{ route('sendsmstocontact')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Send SMS To Contact</span></a>
                </li>
                <li><a href="{{ route('sendbulksms')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Bulk SMS</span></a>
                </li>  </li>
                </ul>
                </li>


</ul></div></div>
