<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
            <div class="float-left">
                <ul class="list header_social" data-aos-duration="3000" data-aos="zoom-in">
                    <li>
                        <a href="{{ $setting->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="{{ $setting->youtube_link }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="{{ $setting->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ $setting->linkin_link }}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                
                </ul>
            </div>
            <div class="float-right">
                <a class="dn_btn" href="tel:+855 {{ $setting->phone_number }}">
                    <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;
                    +855 {{ $setting->phone_number }}
                </a>
                <a class="dn_btn" href="mailto:{{ $setting->mail }}">
                    <i class="fas fa-mail-bulk"></i>&nbsp;&nbsp;
                    {{ $setting->mail }}
                </a>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">

                <a class="navbar-brand logo_h" href="{{ route('home-page') }}">
                    <img src="{{ asset($setting->logo) }}" alt="Logo" width="150px" class="img-fluid">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ Request::segment(1) == '' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home-page') }}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) == 'about' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>

                        <li class="nav-item m-destop submenu dropdown {{ Request::segment(1) == 'course' ? 'active' : '' }}">
                            <a href="{{ route('course') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" >Courses</a>
                            <div class="dropdown-menu">
                                <div class="row">
                                    @foreach ( $mainCategory as $m)
                                    <div class="col-3">
                                        <h6>{{ $m->title }}</h6>
                                        <ul>
                                            @foreach ( $subCategory as $s)
                                                @if ($s->mainCategory_id == $m->id)
                                                    <li class="nav-item">
                                                        <a href="{{ route('course-category', $s->id) }}">{{ $s->title }}</a>
                                                    </li>
                                                @endif                                         
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                    @endforeach
                                    <div class="col-12 all-course">
                                        <a class="" href="{{ route('course') }}">All Courses</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="d-none m-moblie nav-item submenu dropdown {{ Request::segment(1) == 'course' ? 'active' : '' }}">
                            <a href="#collapseExample" class="nav-link dropdown-toggle" data-toggle="collapse" aria-controls="collapseExample">
                                Courses
                            </a>
                            <ul class="collapse" id="collapseExample">
                                @foreach ( $mainCategory as $i => $m)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Network_{{ $i }}" data-toggle="collapse">{{ $m->title }}</a>
                                        <ul class="collapse" id="Network_{{ $i }}">
                                            @foreach ($subCategory as $s)
                                                @if ( $s->mainCategory->id == $m->id)
                                                    <li class="nav-item">
                                                        <a href="{{ route('course-category', $s->id) }}" class="nav-link">{{ $s->title }}</a>
                                                    </li>
                                                @endif   
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            
                            </ul>
                        </li>

                        <li class="nav-item {{ Request::segment(1) == 'blog' ? 'active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                        <li class="nav-item {{ Request::segment(1) == 'contact' ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                        <li class="nav-item {{ Request::segment(1) == 'calendar' ? 'active' : '' }}">
                            <a class="nav-link icon" href="{{ route('calendar') }}">
                                <img src="{{ url('/images/logo/calendar.png') }}" alt="Calendar" class="img-fluid">
                            </a>
                            <a class="nav-link text d-none" href="{{ route('calendar') }}">
                                Calendar
                            </a>
                        </li>
                        <li class="nav-item d-none m-social px-3"">
                            <ul class="list header_social" data-aos-duration="3000" data-aos="zoom-in">
                                <li>
                                    <a href="{{ $setting->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="{{ $setting->youtube_link }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="{{ $setting->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $setting->linkin_link }}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                            
                            </ul>
                        </li>
                        <li class="nav-item d-none m-contact px-3">
                            <a class="dn_btn" href="tel:+855 {{ $setting->phone_number }}">
                                {{ $setting->phone_number }}
                            </a>
                        </li>
                        <li class="nav-item d-none m-contact1 px-3 mb-3">
                            <a class="dn_btn" href="mailto:{{ $setting->mail }}">
                                {{ $setting->mail }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
