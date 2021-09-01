@extends('layouts.website')

@section('title')
    Contact Us
@endsection

@section('content')


    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            @foreach ( $slide as $s)
                <div style="background-image: url({{ asset($s->image) }});" class="overlay bg-parallax"></div>
            @endforeach
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Contact Us</h2>
                    <div class="page_link">
                        <a href="{{ route('home-page') }}">Home</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact_area p_120">
        <div class="container">
            <iframe src="{{ $setting->map }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="mb-5"></iframe>
            <div class="row" style="overflow: hidden">
                <div class="col-lg-3" data-aos-duration="1000" data-aos="fade-right">
                    <div class="contact_info mb-5">
                        <div class="info_item" data-aos-duration="1000" data-aos="fade-up">
                            <i class="lnr lnr-home"></i>
                            <h6>Phnom Penh, Cambodia</h6>
                            <p>{{ $setting->address }}</p>
                        </div>
                        <div class="info_item" data-aos-duration="1000" data-aos="fade-up">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="tel:{{ $setting->phone_number }}">{{ $setting->phone_number }}</a></h6>
                            <p>{{ $setting->open_daily }}</p>
                        </div>
                        <div class="info_item" data-aos-duration="1000" data-aos="fade-up">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="mailto:{{ $setting->mail }}"><span class="__cf_email__">{{ $setting->mail }}</span></a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9" data-aos-duration="1000" data-aos="fade-left">
                    <form class="row contact_form" action="{{ route('storeEmail') }}" method="post" id="contactForm">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="2" placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

