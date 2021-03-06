<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('home')}}" class="dropdown-toggle no-arrow {{ (request()->is('home')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
        </a>
    </li>


    @if ( Auth::user()->bookmarkersstatus == 'Allowed' )
    <li class="dropdown">
        <a href="{{ route('bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">BookMarkers</span>
        </a>
    </li>
                                     @else   
                                    @endif
                                    @if ( Auth::user()->publiclotterystatus == 'Allowed' )
                                    <li class="dropdown">
                                        <a href="{{ route('publiclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('publiclottery*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
                                        </a>
                                    </li>                                   
                                     @else   
                                    @endif

   
                                    @if ( Auth::user()->publicgamingstatus == 'Allowed' )
                                    <li class="dropdown">
                                        <a href="{{ route('publicgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('publicgaming*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
                                        </a>
                                    </li>
                                    @else   
                                    @endif

 
    
 


</ul>