@extends('layouts.website')

@section('title')
    About Us
@endsection

@section('content')

    <div class="about">
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                @foreach ( $slide as $s)
                <div style="background-image: url({{ asset($s->image) }});" class="overlay bg-parallax"></div>
                @endforeach
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>About Us</h2>
                        <div class="page_link">
                            <a href="{{ route('home-page') }}">Home</a>
                            <a href="{{ route('about') }}">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="testimonials_area p_120" data-aos-duration="2000" data-aos="fade-up">
            <div class="container">
                <div class="main_title">
                    <h2>Our Instructor</h2>
                    {{-- <p>
                        There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope.
                        It’s exciting to think about setting up your own viewing station.
                    </p> --}}
                </div>
                <div class="testi_slider owl-carousel">
                    @foreach ( $instructor as $i => $in)
                    <div class="item">
                        <div class="testi_item">
                            <div class="img"  data-toggle="modal" data-target="#Instructor_{{ $i }}">
                                <img src="{{ asset($in->profile)  }}" alt=" profile instructor" class="img-fluid">
                            </div>
                            <h4>{{ $in->full_name }}</h4>
                            <div class="two-line">
                                {!! $in->des !!}
                            </div>
                            <ul class="list header_social mt-2" data-aos-duration="1000" data-aos="zoom-in">
                                <li><a href="{{ $in->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $in->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $in->linkin_link }}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    
        <section class="team_area p_120" data-aos-duration="2000" data-aos="fade-up">
            <div class="container">
                <div class="main_title">
                    <h2>Our Teams</h2>
                    {{-- <p>
                        There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope.
                        It’s exciting to think about setting up your own viewing station.
                    </p> --}}
                </div>
                <div class="row team_inner">
                    @foreach ( $team as $t)
                    
                        <div class="col-lg-3 col-sm-6 col-6" data-aos-duration="1000" data-aos="zoom-in">
                            <div class="team_item">

                                <div class="team_img">
                                    <img class="rounded-circle img-fluid" src="{{ url($t->profile) }}" alt="Profile" class="img-fluid">
                                    <div class="hover d_social">
                                        <a href="{{ $t->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="{{ $t->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="{{ $t->linkin_link }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="team_name">
                                    <h4>{{ $t->full_name }}</h4>
                                    <p>{{ $t->position }}</p>
                                </div>
                                <ul class="list header_social m_social d-none" data-aos-duration="1000" data-aos="zoom-in">
                                    <li><a href="{{ $t->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $t->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $t->linkin_link }}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </section>
    </div>

<!-- Modal -->
@foreach ( $instructor as $i => $in )
<div class="about">
    <div class="modal fade instructor" id="Instructor_{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <div class="profile">
                        <img src="{{ asset($in->profile) }}" alt="" class="img-fluid">
                    </div>
                    {{ $in->full_name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="detail">
                    {{-- <div class="row">
                        <div class="col-3"> 
                            <div class="profile">
                                <img src="{{ asset($in->profile) }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="name">
                                <h5>{{ $in->full_name }}</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-0">
                                        <a href="tel:{{ $in->phone_number }}" class="nav-link pl-0">
                                            <span class="lnr lnr-phone-handset"></span> :
                                            {{ $in->phone_number }}
                                        </a>
                                    </li>
                                    <li class="list-group-item p-0">
                                        <a href="mailto:{{ $in->mail }}" class="nav-link pl-0">
                                            <span class="lnr lnr-envelope"></span> :
                                            {{ $in->mail }}
                                        </a>
                                    </li>
                                    <li class="list-group-item"></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="des generic-blockquote">
                        {!! $in->des !!}
                        <ul class="list header_social" data-aos-duration="1000" data-aos="zoom-in">
                            <li><a href="{{ $in->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $in->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $in->linkin_link }}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endforeach
@endsection
