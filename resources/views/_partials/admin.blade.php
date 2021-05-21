<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('admin-dashboard')}}" class="dropdown-toggle no-arrow {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="{{ route('users')}}" class="dropdown-toggle no-arrow {{ (request()->is('user*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Users</span>
        </a>
    </li>
  
    <li class="dropdown">
        <a href="{{ route('categorytypes')}}" class="dropdown-toggle no-arrow {{ (request()->is('categorytypes*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Category Types</span>
        </a>
    </li>
    
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Company</span>
        </a>
        <ul class="submenu">
       <li> <a href="{{ route('company.bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('company.bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext"> Company</span>
        </a></li>
        <!-- <li> <a href="{{ route('company.publickgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('company.publickgaming*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming Company</span>
        </a></li>
        <li> <a href="{{ route('company')}}" class="dropdown-toggle no-arrow {{ (request()->is('company*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery Company</span>
        </a></li> -->
            
        </ul>
    </li>
   
   
   
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Books</span>
        </a>
        <ul class="submenu">
        <li class="dropdown">
        <a href="{{ route('bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">BookMarkers</span>
        </a>
    </li>

    <li class="dropdown">
        <a href="{{ route('publiclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('publiclottery*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
        </a>
    </li>
    
    <li class="dropdown">
        <a href="{{ route('publicgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('publicgaming*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
        </a>
    </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="{{ route('shop')}}" class="dropdown-toggle no-arrow {{ (request()->is('shop*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Bookmarkers Shop</span>
        </a>
    </li>

    <li class="dropdown">
        <a href="{{ route('sendsms')}}" class="dropdown-toggle no-arrow {{ (request()->is('sendsms*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Send SMS To Company</span>
        </a>
    </li>


    <li class="dropdown">
        <a href="{{ route('sendsmstocontact')}}" class="dropdown-toggle no-arrow {{ (request()->is('sendsmstocontact*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Send SMS To Contact</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="{{ route('sendbulksms')}}" class="dropdown-toggle no-arrow {{ (request()->is('sendbulksms*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Bulk SMS</span>
        </a>
    </li>




 


    <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-list3"></span><span class="mtext">Reports</span>
						</a>
						<ul class="submenu">
                        <li class="dropdown">
                            <a href="{{ route('reports')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports*')) ? 'active' : '' }}">
                                    <span class="micon icon-copy ti-user"></span><span class="mtext">Bookmarkers Companies</span>
                             </a>
                            </li>
					
                           <li class="dropdown">
                            <a href="{{ route('indexpubliclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('indexpubliclottery*')) ? 'active' : '' }}">
                                <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
                            </a>
                            </li>
							
                            <li class="dropdown">
                            <a href="{{ route('indexpublicgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('indexpublicgaming*')) ? 'active' : '' }}">
                                <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
                            </a>
                           </li>

							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon fa fa-plug"></span><span class="mtext">Graph</span>
								</a>
								<ul class="submenu child">
								
                                <li class="dropdown">
                            <a href="{{ route('reports.publicgamingGGr')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports.publicgamingGGr*')) ? 'active' : '' }}">
                                    <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming GGR</span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="{{ route('reports.publiclotteryGGr')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports.publiclotteryGGr*')) ? 'active' : '' }}">
                                    <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery GGR</span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="{{ route('reports.company-ggr')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports.company-ggr*')) ? 'active' : '' }}">
                                    <span class="micon icon-copy ti-user"></span><span class="graph">Bookmarkers GGR</span>
                                </a>
                            </li>

                     	
                                

								</ul>
							</li>
				

                            <li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon fa fa-plug"></span><span class="mtext">All Rec</span>
								</a>
								<ul class="submenu child">
								
                                <li class="dropdown"> 
                            <a href="{{ route('reports.allCompaniesGraph')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports.allCompaniesGraph*')) ? 'active' : '' }}">
                                    <span class="micon icon-copy ti-user"></span><span class="mtext">All Companies Graph</span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="{{ route('reports.activestatuscompanies')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports.activestatuscompanies*')) ? 'active' : '' }}">
                                    <span class="micon icon-copy ti-user"></span><span class="mtext">Active/Inactive Companies</span>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="{{ route('reports.company-ggr')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports.company-ggr*')) ? 'active' : '' }}">
                                    <span class="micon icon-copy ti-user"></span><span class="graph">Bookmarkers GGR</span>
                                </a>
                            </li>

                     	
                                

								</ul>
							</li>



						</ul>
					</li>

    <li class="dropdown">
        <a href="{{ route('useractivitylogs')}}" class="dropdown-toggle no-arrow {{ (request()->is('useractivitylogs*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Activity Logs</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="{{ route('accountsetting',Auth::guard('admin')->user()->admin_id)}}" class="dropdown-toggle no-arrow {{ (request()->is('accountsetting*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Account Setting</span>
        </a>
    </li>
<!-- 
   <li class="dropdown">   
        <a href="{{ route('publiclottery_shop')}}" class="dropdown-toggle no-arrow {{ (request()->is('publiclottery_shop*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery Shop</span> 
        </a>
    </li>

    <li class="dropdown">
        <a href="{{ route('publicgaming_shop')}}" class="dropdown-toggle no-arrow {{ (request()->is('publicgaming_shop*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming Shop</span>
        </a>
    </li> -->


</ul>
