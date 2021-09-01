@extends('layouts.website')

@section('title')
    Blog Detail
@endsection

@section('content')

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div style="background-image: url(/images/contact/banner.jpg);" class="overlay bg-parallax"
                data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Blog</h2>
                    <div class="page_link">
                        <a href="{{ route('home-page') }}">Home</a>
                        <a href="{{ route('blog') }}">Blog</a>
                        <a href="{{ route('blog-detail', $blog->id) }}">Blog Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog_area blog_categorie_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-post-area row">
                        <div class="col-lg-12 p-0">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset($blog->image) }}" alt="Image Blog">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 generic-blockquote">
                            <div class="blog_info pt-0">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <i class="lnr lnr-user"></i> 
                                        {{ $blog->user->name }}
                                    </li>
                                    <li class="nav-item ml-auto">
                                        <i class="lnr lnr-calendar-full"></i>
                                        {{ $blog->created_at->format('m-d-Y') }} 
                                    </li>
                                </ul>
                                <div class="post_tag pb-0"> 
                                    <ul class="nav">
                                        @foreach ($blog->blogTag as $key => $item)
                                        <li class="nav-item">
                                            <div class="d-flex">
                                                <i class="lnr lnr-tag"></i>
                                                {{ $item->title }}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>                        
                                </div>
                            </div>

                            <h2>{{ $blog->title }}</h2>
                            <div class="quotes">
                                {!! $blog->description !!}
                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 mb-5">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Post Catgories</h4>
                            <ul class="list cat-list">
                                @foreach ($blogCategory as $bc)
                                <li>
                                    <a href="{{ route('blog-category', $bc->id) }}" class="d-flex justify-content-between">
                                        <p>{{ $bc->title }}</p>
                                        <p>{{ $bc->blog->count() }}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="br"></div>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            @foreach ($limitBlog as $lb)
                                <div class="media post_item">
                                    <div class="img img-hover-zoom">
                                        <img src="{{ asset($lb->image) }}" alt="Image" width="100px" class="img-fliud">
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ route('blog-detail', $lb->id) }}">
                                            <h3 class="two-line">{{ $lb->title }}</h3>
                                        </a>
                                        <p><i class="lnr lnr-calendar-full mr-2"></i>{{ $lb->created_at->format('m-d-Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>

                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                            <div class="br"></div>
                        </aside>

                        {{-- <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <p>
                                Here, I focus on a range of items and features that we use in life without
                                giving them a second thought.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Enter email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom">You can unsubscribe at any time</p>
                            <div class="br"></div>
                        </aside> --}}
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                @foreach ($blog->blogTag as $tag)
                                    <li><a href="#">{{ $tag->title }}</a></li>
                                @endforeach                                 
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6115cd10d3515f05"></script>
@endpush