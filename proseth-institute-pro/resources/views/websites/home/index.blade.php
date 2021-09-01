@extends('layouts.website')

@section('title')
    Homae Page
@endsection

@section('content')

    <div class="home">
        <section class="slide">
            <div class="swiper-container">
        
                <!-- swiper slides -->
                <div class="swiper-wrapper">
                    @foreach ( $slide as $s)
                    <div class="swiper-slide" style="background-image: url('{{ $s->image}}');">
                        <div class="text row">
                            <div class="col-sm-10 col-8">
                                <h2>{{ $s->title }}</h2>
                                <p>{{ $s->sub_title }}</p>
                            </div>
                            <div class="col-sm-2 col-4 m-auto">
                                <a class="btn btn-outline-succes btn-sm" href="{{ $s->link }}">{{ $s->title_button }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                
                <!-- next / prev arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- !next / prev arrows -->
                <div class="swiper-pagination"></div>
                
            </div>
        </section>
    
        <section class="courses_area p_120" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
            <div class="container">
                <div class="main_title">
                    <h2>Main Course</h2>
                    {{-- <p>
                        We provide the Professional Courses which are taught by certified and experienced instructors.
                    </p> --}}
                </div>
    
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                    @foreach ( $mainCategory as $i => $m)
                        <li class="nav-item">
                            <a class="nav-link {{ $m->id == '1' ? 'active':'' }}" id="main{{ $i }}-tab" data-toggle="pill" href="#main{{ $i }}" role="tab" aria-controls="main{{ $i }}" aria-selected="true">
                                <span>{{ $m->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
    
                <div class="tab-content" id="pills-tabContent">
    
                    @foreach ( $mainCategory as $i => $m)
    
                        <div class="tab-pane fade {{ $m->id == '1' ? 'show active':''}}" id="main{{ $i }}" role="tabpanel" aria-labelledby="main{{ $i }}-tab">
                            
                            <div class="row courses_inner">
    
                                @foreach ( $subCategory as $s )
                                    @if ( $s->mainCategory_id == $m->id )
    
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 box-main" data-aos-duration="1000" data-aos="zoom-in">
                                            <a href="{{ route('course-category', $s->id) }}">
                                                <div class="row box">
                                                    <div class="col-4 img">
                                                        <img src="{{ asset($s->image) }}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col-8 des">
                                                        <h6>{{ $s->title }}</h6>
                                                        <span class="three-line " title="{{ $s->des }} "> 
                                                            {{ $s->des }} 
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
    
                                    @endif
                                @endforeach
    
                            </div>
    
                        </div>
                    @endforeach
                </div>
    
            </div>
        </section>
    
    
        <section class="team_area p_120" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
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
                    
                        <div class="col-lg-3 col-sm-6" data-aos-duration="1000" data-aos="zoom-in">
                            <div class="team_item">
                                <div class="team_img">
                                    <img class="rounded-circle img-fluid" src="{{ url($t->profile) }}" alt="Profile" class="img-fluid">
                                    <div class="hover">
                                        <a href="{{ $t->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="{{ $t->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="{{ $t->linkin_link }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="team_name">
                                    <h4>{{ $t->full_name }}</h4>
                                    <p>{{ $t->position }}</p>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </section>
    
        @if ($blog->count() > 0)
        <section class="latest_blog_area p_120" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
            <div class="container">
                <div class="main_title">
                    <h2>Latest Posts From Blog</h2>
                    {{-- <p>
                        There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope.
                        It’s exciting to think about setting up your own viewing station.
                    </p> --}}
                </div>
                <div class="row latest_blog_inner">
                    @foreach ($blog as $b)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12" data-aos-duration="1500" data-aos="zoom-in">
                            <div class="l_blog_item">
                                <a href="{{ route('blog-detail', $b->id ) }}">
                                    <div class="img img-hover-zoom">
                                        <img class="img-fluid" src="{{ asset($b->image) }}" alt="Image" class="img-fluid">
                                    </div>
                                </a>
                                <span class="date" href="#">{{ $b->created_at->format('m-d-Y') }} | By {{ $b->user->name }}</span>
                                <a href="{{ route('blog-detail', $b->id ) }}">
                                    <h5 class="two-line">
                                        {{ $b->title }}
                                    </h5>
                                </a>
                                <div class="three-line">
                                    {!! $b->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </div>
    
@endsection
