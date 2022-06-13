<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="" type="image/png" />
    <title>Chi tiết bài viết</title>
    @include('clients.layouts.style')
</head>

<body>
    @include('clients.layouts.header')

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2 class="font-weight-bold">Chi tiết bài viết</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('homepage') }}" class="text-decoration-none">Trang chủ</a>
                        <span>Chi tiết bài viết</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src={{ asset('uploads/' . $post->image) }} alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $post->name }}</h2>
                            <p class="excert">
                                {{ $post->content }}
                            </p>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    MCSE boot camps have its supporters and its detractors. Some people do not
                                    understand why you should have to spend money on boot camp when you can get the MCSE
                                    study materials yourself at a fraction of the camp price. However, who has the
                                    willpower to actually sit through a self-imposed MCSE training.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h4>Comments</h4>
                        <div class="comment-list">
                            @foreach ($post->comment as $comment)
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="mr-3">
                                            <img width="50px"
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhjufva9NpUTku91s_3FePG5Nk7b5EVfq1eXOHbJ9ecF9Mtq3-FV98CZKoOBZXUKJyOvk&usqp=CAU"
                                                alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                {{ $comment->content }}
                                            </p>

                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#" class="text-decoration-none">
                                                            @if ($comment->user_id)
                                                                <h6>{{ $comment->user->name }}</h6>
                                                            @endif
                                                        </a>
                                                    </h5>
                                                    <p class="date">
                                                        {{ $comment->created_at->format('Y-m-d') }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="comment-form">
                        @if (!Auth::check())
                            <p>Đăng nhập để bình luận bài viết</p>
                        @elseif(Auth::check())
                            <h4>Post comment</h4>
                            <form class="row contact_form" method="post"
                                action="/addblogcomment?post_id={{ $post->id }}" id="contactForm"
                                novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="id" value={{ $post->slug }}>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" id="message" rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn btn-primary">
                                        Submit Now
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="">
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
