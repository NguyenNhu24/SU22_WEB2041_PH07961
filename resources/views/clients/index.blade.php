<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Trang chủ</title>
    @include('clients.layouts.style')
</head>

<body>
    @include('clients.layouts.header')
    <div class="mb-5 container">
        <img class="w-100"
            src="https://m.media-amazon.com/images/S/aplus-media/vc/8c302bb1-0aa4-40e7-a0c2-fb3025f17258.__CR0,0,1464,600_PT0_SX1464_V1___.jpg"
            alt="">
    </div>
    </div>
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title text-decoration-none">
                            <i class="flaticon-money"></i>
                            <h3>Money back gurantee</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title text-decoration-none">
                            <i class="flaticon-truck"></i>
                            <h3>Free Delivery</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title text-decoration-none">
                            <i class="flaticon-support"></i>
                            <h3>Alway support</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title text-decoration-none">
                            <i class="flaticon-blockchain"></i>
                            <h3>Secure payment</h3>
                        </a>
                        <p>Shall open divide a one</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            @foreach ($category as $item)
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="main_title">
                            <h2><span>{{ $item['name'] }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row" id="cate_{{ $item['id'] }}">
                    @foreach ($item['product'] as $pro)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <div class="product-img">
                                    <img class="img-fluid w-100" src={{ url('uploads') }}/{{ $pro['image'] }}
                                        alt="" />
                                    <div class="p_icon">
                                        <a href="{{ route('detail_product', ['slug' => $pro['slug']]) }}">
                                            <i class="ti-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-btm">
                                    <a href="{{ route('detail_product', ['slug' => $pro['slug']]) }}"
                                        class="d-block text-decoration-none">
                                        <h4>{{ $pro['name'] }}</h4>
                                    </a>
                                    <div class="mt-3">
                                        <span class="mr-4">{{ number_format($pro['price'], 0, '', ',') }}
                                            đ</span>
                                        <del>{{ number_format($pro['sale'], 0, '', ',') }} đ</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <section class="blog-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Blogs</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($post as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="thumb">
                                <img class="img-fluid" src={{ asset('uploads/' . $item->image) }} alt="">
                            </div>
                            <div class="short_details">
                                <div class="meta-top d-flex">
                                    <a href="#">By Admin</a>
                                    <a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
                                </div>
                                <a class="d-block text-decoration-none"
                                    href="{{ route('detail_blog', ['slug' => $item->slug]) }}">
                                    <h4>{{ $item->name }}</h4>
                                </a>

                                <a href="#" class="blog_btn">Learn More <span
                                        class="ml-2 ti-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('clients.layouts.footer')
    @include('clients.layouts.script')
</body>

</html>
