<footer class="footer-area py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-md-12 col-sm-12 mb-3">
                <div class="single-footer-widget tp_widgets">
                    <h6 class="footer_title">Proseth Institute</h6>
                    <div class="text">
                        <p>
                            {{ $setting->footer_text }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2  col-md-6 col-sm-6 mb-3">
                <div class="single-footer-widget tp_widgets">
                    <h6 class="footer_title">Menu</h6>
                    <ul class="list">
                        <li><a href="{{ route('course') }}">Courses</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                <aside class="f_widget news_widget">
                    <div class="f_title">
                        <h3 class="footer_title">Our Map</h3>
                    </div>
                    <div id="mc_embed_signup">
                        <iframe src="{{ $setting->map }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" class="mb-5"></iframe>
                    </div>
                </aside>
            </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-md-8 col-sm-12 footer-text m-0">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());

                </script> 
                Powered by : Proseth Institute  ©  2013-2021 <i class="fa fa-heart-o"
                    aria-hidden="true"></i>
            </p>
            <div class="col-lg-4 col-md-4 col-sm-12 footer-social">
                <a href="{{ $setting->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i>
                <a href="{{ $setting->youtube_link }}" target="_blank"><i class="fa fa-youtube"></i></a>
                <a href="{{ $setting->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="{{ $setting->linkin_link }}" target="_blank"><i class="fa fa-linkedin-square"></i></a>
            </div>
        </div>
    </div>
</footer>
