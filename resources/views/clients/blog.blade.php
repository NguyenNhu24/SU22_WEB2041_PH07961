<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Bài viết</title>
    <!-- Bootstrap CSS -->
    @include('clients.layouts.style')

</head>

<body>

    @include('clients.layouts.header')

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2 class="font-weight-bold">Bài viết</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('homepage') }}" class="text-decoration-none">Trang chủ</a>
                        <span>Bài viết</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($post as $item)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src={{ asset('uploads/' . $item->image) }} alt="">
                                    <a href="#" class="blog_item_date text-decoration-none">
                                        <p>{{ $item->date }}</p>
                                    </a>
                                </div>

                                <div class="blog_details text-decoration-none">
                                    <a class="d-inline-block text-decoration-none"
                                        href="{{ route('detail_blog', ['slug' => $item->slug]) }}">
                                        <h2>{{ $item->name }}</h2>
                                    </a>
                                    <ul class="blog-info-link">
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    {{ $post->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search Keyword">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i
                                                    class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="main_btn rounded-0 w-100" type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($recentPost as $item)
                                <div class="media post_item">
                                    <img width="70px" src={{ asset('uploads/' . $item->image) }} alt="post">
                                    <div class="media-body">
                                        <a href="{{ route('detail_blog', ['slug' => $item->slug]) }}"
                                            class="text-decoration-none">
                                            <h3>{{ $item->name }}</h3>
                                        </a>
                                        <p>{{ $item->date }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter email" required>
                                </div>
                                <button class="main_btn rounded-0 w-100" type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('clients.layouts.footer')
    @include('clients.layouts.script')
</body>

</html>
