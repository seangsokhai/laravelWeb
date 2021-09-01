@extends('layouts.website')

@section('title')
    Course Page
@endsection

@section('content')
    <section class="banner_area" >
        <div class="banner_inner d-flex align-items-center">
            @foreach ( $slide as $s)
                <div style="background-image: url({{ asset($s->image) }});" class="overlay bg-parallax"></div>
            @endforeach
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Courses</h2>
                    <div class="page_link">
                        <a href="{{ route('home-page') }}">Home</a>
                        <a href="{{ route('course') }}">Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="courses_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Courses</h2>
                {{-- <p>
                    There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope.
                    It’s exciting to think about setting up your own viewing station.
                </p> --}}
            </div> 

            <div class="dropdown-animan">
                <div class="button genric-btn success-border">
                    <span>Filter</span>
                    <i class="fas fa-chevron-up arrow"></i>
                </div>
                <div class="dropdown">
                    <div class="filter">
                        <div id="accordion">
                            @foreach ($mainCategory as $i => $m)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#main_{{ $i }}" aria-expanded="true" aria-controls="Network">
                                            {{ $m->title }}
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                    </div>

                                    <div id="main_{{ $i }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <ul class="unordered-list">
                                            @foreach ( $subCategory as $s)
                                                @if ($s->mainCategory_id == $m->id)
                                                    <li>
                                                        <a href="{{ route('course-category', $s->id) }}">{{ $s->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row courses_inner" data-aos-duration="2000" data-aos="fade-up">
                <div class="col-12 c-table bar-r">
                    @foreach ($subCategory as $s)
                        @foreach ($schedule as $sch)
                            @if ($sch->course->subCategory_id == $s->id)
                                <div class="title">
                                    <span class="header">{{ $s->title }}</span>
                                </div>

                                <div class="blog mb-3" data-aos-duration="1000" data-aos="fade-up">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                                            <a href="{{ route('course-detail', $sch->id )}}">
                                                <div class="img img-hover-zoom">
                                                    <img src="{{ asset($sch->course->image) }}" alt="" class="img-fluid">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-7 col-md-9 col-sm-9 col-8">
                                            <div class="text">
                                                <a href="{{ route('course-detail', $sch->id ) }}">
                                                    <h5 class="one-line">{{ $sch->course->title }}</h5>
                                                </a>
                                                <div class="three-line">
                                                    {!! $sch->course->course_over_view !!}
                                                </div>
                                                <div class="pf mt-2">
                                                    <div class="img">
                                                        <img src="{{ asset($sch->instructor->profile) }}" alt="Instructor Profile" class="img-fluid"></div>
                                                        <span>{{ $sch->instructor->full_name }}</span>
                                                </div>
                                                <div class=" m-pf mt-2 d-none">
                                                    <table>
                                                        <tr>
                                                            <th><span>Instructor: {{ $sch->instructor->full_name }}</span></th>
                                                            <th><span>Class Start: {{ date('d-m-Y', strtotime($sch->start_date)); }}</span></th>
                                                            <th><a href="{{ route('course-detail', $sch->id) }}"> Read More</a></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none col-sm-12 sm-pf">
                                            <table class="w-100">
                                                <tr>
                                                    <th><span>Instructor: {{ $sch->instructor->full_name }}</span></th>
                                                    <th><span>Class Start: {{ date('d-m-Y', strtotime($sch->start_date)); }}</span></th>
                                                    <th><a href="{{ route('course-detail', $sch->id) }}"> Read More</a></th>
                                                </tr>
                                                <tr class="d-none">
                                                    <th><a href="{{ route('course-detail', $sch->id) }}"> Read More</a></th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-2">
                                            <div class="date">
                                                <h6>Class Start</h6>
                                                <p>{{ date('d-m-Y', strtotime($sch->start_date)); }}</p>
                                                <a href="{{ route('course-detail', $sch->id) }}" class="genric-btn success-border medium">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
