@extends('layouts.website')

@section('title')
    Blog
@endsection

@section('content')


    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            @foreach ( $slide as $s)
                <div style="background-image: url({{ asset($s->image) }});" class="overlay bg-parallax"></div>
            @endforeach
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Blog</h2>
                    <div class="page_link">
                        <a href="{{ route('home-page') }}">Home</a>
                        <a href="{{ route('blog') }}">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog_area mt-5">
        <div class="container">
            <div class="main_title">
                <h2>Our Blog</h2>
                {{-- <p>
                    There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope.
                    It’s exciting to think about setting up your own viewing station.
                </p> --}}
            </div>
            <div class="row">
                <div class="col-lg-8" data-aos-duration="2000" data-aos="fade-right">
                    @foreach ($blog as $b)
                    <div class="row blog" data-aos-duration="1000" data-aos="fade-up">
                        <div class="col-4">
                            <a href="{{ route('blog-detail', $b->id) }}">
                                <div class="img img-hover-zoom">
                                    <img src="{{ asset($b->image) }}" alt="" class="img-fluid">
                                </div>
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="text">
                                <a href="{{ route('blog-detail', $b->id) }}">
                                    <h5 class="one-line">{{ $b->title }}</h5>
                                </a>
                                <ul class="nav">
                                    <li class="nav-item">
                                        <i class="lnr lnr-calendar-full"></i>
                                        {{ $b->created_at->format('d-m-Y') }}
                                    </li>
                                    <li class="nav-item ml-auto">
                                        <i class="lnr lnr-user"></i>
                                        {{ $b->user->name }}
                                    </li>
                                </ul>
                                <div class="tag one-line">
                                    @foreach($b->blogTag as $key => $item)
                                    <span class="mr-2">
                                        <i class="lnr lnr-tag"></i>
                                        {{ $item->title }}
                                    </span>
                                    @endforeach
                                </div>
                                <div class="three-line">
                                    {!! $b->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-none m-des">
                            <div class="two-line">
                                {!! $b->description !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="paginate">
                        {!! $blog->links('vendor.pagination.custom') !!}
                    </div>
                </div>
                <div class="col-lg-4 mb-5" data-aos-duration="2000" data-aos="fade-left">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget" data-aos-duration="1000" data-aos="fade-up">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search Posts" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"> <i class="lnr lnr-magnifier"></i> </button>
                                    </span>
                                </div>
                            </form>
                            
                            <div class="br"></div>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget" data-aos-duration="1000" data-aos="fade-up">
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

                        <aside class="single_sidebar_widget popular_post_widget" data-aos-duration="1000" data-aos="fade-up">
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
                            <div class="br"></div>
                        </aside>
                        
                        <aside class="single-sidebar-widget tag_cloud_widget" data-aos-duration="1000" data-aos="fade-up">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                @foreach ($blog as $b)
                                    @foreach ($b->blogTag as $tag)
                                        <li><a href="#">{{ $tag->title }}</a></li>
                                    @endforeach                                 
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/websites/pagination.css') }}">
@endpush
