<!-- header navbar start -->
    <div class="navbar-area">
        <nav class="navbar navbar-area navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <button class="menu toggle-btn d-block d-lg-none" data-toggle="collapse" data-target="#realdeal_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="logo" style="width:50%;">
                    <a href="{{ route('main.index') }}"><img src="{{ asset('img/logo.png') }}" alt="logo" ></a>
                </div>
               
                <div class="collapse navbar-collapse" id="realdeal_main_menu">
                    <ul class="navbar-nav menu-open">
                        
                        <li>
                            <a href="{{ route('tenders') }}">Tenders <span><i class="fa fa-caret-down  "></i></span></a>
                            
                        </li>
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-mobile mt-2 ml-1">
                    
                    @auth
                        <a class="btn btn-yellow" href="{{ route('client.logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                            Logout
                        </>
                        <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></a>

                        <a class="btn btn-danger" href="{{ route('postTender') }}">Post Tender <span class="right"><i class="la la-plus"></i></span></a>

                    @else
                        <a class="btn btn-yellow" href="{{ route('clientLogin') }}">Login/Register<span class="right"></span></a>
                    @endauth

                    
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    @auth
                        <a class="btn btn-yellow" href="{{ route('client.logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>
                            Logout
                        </>
                        <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></a>

                        <a class="btn btn-danger" href="{{ route('postTender') }}">Post Tender <span class="right"><i class="la la-plus"></i></span></a>

                    @else
                        <a class="btn btn-yellow" href="{{ route('clientLogin') }}">Login/Register<span class="right"></span></a>
                    @endauth

                </div>
            </div>
        </nav>
    </div>