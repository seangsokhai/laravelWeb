@extends('layouts.website')

@section('title')
    Course Detail
@endsection

@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" style="background-image: url(/images/home-page/slide-1.jpg);"
                data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Course Details</h2>
                    <div class="page_link">
                        <a href="{{ route('home-page') }}">Home</a>
                        <a href="{{ route('course') }}">Course</a>
                        {{-- <a href="{{ route('course-detail', encrypt($schedule->id)) }}">Course Details</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course_details_area p_120">
        <div class="container">
            <div class="row course_details_inner">
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="c_details_img mb-3">
                        <img class="img-fluid" src="{{ asset($schedule->course->image) }}" alt="Course Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <div class="c_details_list">
                        <ul class="list">
                            <li>Course :
                                <span class="c-name">{{ $schedule->course->title }}</span>
                                <div class="clear"></div>
                            </li>
                            <li>Instructor :<span>{{ $schedule->instructor->full_name }}</span></li>
                            {{-- <li>Course Fee :<span>$230</span></li> --}}
                            <li>Duration :<span>{{ $schedule->duration }}</span></li>
                            <li>Class Start :<span>{{ $schedule->start_date }}</span></li>
                        </ul>
                        <a class="genric-btn mb-2 success subscrib arrow w-100" data-toggle="collapse" href="#Subscrib"
                            data-target="#Subscrib" aria-expanded="false" aria-controls="Subscrib">
                            <span>Subscrib Query</span>
                            <span class="lnr lnr-arrow-right"></span>
                        </a>
                        <div class="collapse mb-3" id="Subscrib">
                            <div class="card card-body">
                                {{ Form::open(['url' => route('storeSubscribQuery'), 'class' => 'needs-validation','method' => 'post']) }}
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" value="{{ $schedule->course->id }}" class="single-input" name="course_id" hidden>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" value="{{ $schedule->id }}" class="single-input" name="schedule_id" hidden>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" class="single-input" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required="" class="single-input" required>
                                        </div>
                                    </div>
                                    <div class="input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                        </div>
                                        <div class="form-group form-select" id="default-select">
                                            <select name="gender">
                                                <option disabled selected > Gender </option>
                                                <option value="Male">Male</option>
                                                <option value="Famale">Famale</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" class="single-input" name="phone_number" id="inputNphone" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                        <input type="email" class="single-input" name="email" id="inputEmail" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="single-textarea" name="message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
                                    </div>
                                    <button type="submit" class="genric-btn success-border medium w-100">Submit</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <a class="genric-btn success mb-2 register arrow w-100" data-toggle="collapse" href="#register"
                            data-target="#register" aria-expanded="false" aria-controls="register">
                            Register
                            <span class="lnr lnr-arrow-right"></span>
                        </a>
                        <div class="collapse mb-3" id="register">
                            <div class="card card-body">
                                {{ Form::open(['url' => route('storeStudent'), 'class' => 'needs-validation','method' => 'post']) }}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" value="{{ $schedule->course->id }}" class="single-input" name="course_id" hidden>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" value="{{ $schedule->id }}" class="single-input" name="schedule_id" hidden>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="single-input" name="first_name" id="inputFname" placeholder="first name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="single-input" name="last_name" id="inputLname" placeholder=" last name" required>
                                        </div>
                                    </div> 

                                    <div class="input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                        </div>
                                        <div class="form-group form-select" id="default-select">
                                            <select name="gender">
                                                <option disabled selected > Gender </option>
                                                <option value="Male">Male</option>
                                                <option value="Famale">Famale</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" class="single-input" name="phone_number" id="inputNphone" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                        <input type="email" class="single-input" name="email" id="inputEmail" placeholder="Email" required>
                                    </div>
                                    <div class="form-group input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-building" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" class="single-input" name="company_or_school" id="inputCompany" placeholder="Company or School">
                                    </div>
                                        
                                    <div class="form-group input-group-icon">
                                        <div class="icon">
                                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" class="single-input" name="position_or_subject" id="inputPosition" placeholder="Position or Subject">
                                    </div>

                                    <button type="submit" class="genric-btn success-border medium w-100">Register</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" id="co-tab" data-toggle="tab" href="#co" role="tab" aria-controls="co"
                                aria-selected="true">Course Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ca-tab" data-toggle="tab" href="#ca" role="tab" aria-controls="ca"
                                aria-selected="false">Course Audience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cou-tab" data-toggle="tab" href="#cou" role="tab" aria-controls="cou"
                                aria-selected="false">Course Outline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cc-tab" data-toggle="tab" href="#cc" role="tab" aria-controls="cc"
                                aria-selected="false">Course Completion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cp-tab" data-toggle="tab" href="#cp" role="tab" aria-controls="cp"
                                aria-selected="false">Course Prerequisites</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade  show active" id="co" role="tabpanel" aria-labelledby="co-tab">
                            <div class="objctive_text">
                                {!! $schedule->course->course_over_view !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ca" role="tabpanel" aria-labelledby="ca-tab">
                            <div class="objctive_text">
                                {!! $schedule->course->course_audience !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cou" role="tabpanel" aria-labelledby="cou-tab">
                            <div class="objctive_text">
                                {!! $schedule->course->course_outline !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cc" role="tabpanel" aria-labelledby="cc-tab">
                            <div class="objctive_text">
                                {!! $schedule->course->course_completion !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cp" role="tabpanel" aria-labelledby="cp-tab">
                            <div class="objctive_text">
                                {!! $schedule->course->course_prerequisites !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
