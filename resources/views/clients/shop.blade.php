<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Sản phẩm</title>
    @include('clients.layouts.style')
</head>

<body>
    @include('clients.layouts.header')
    <div class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class=" mb-md-0">
                        <h2 class="font-weight-bold">Sản phẩm</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('homepage') }}" class="text-decoration-none">Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="latest_product_inner">
                        <div class="row">
                            @foreach ($product as $item)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <img class="card-img" src={{ asset('uploads/' . $item->image) }}
                                                alt="" />
                                            <div class="p_icon">
                                                <a href="#">
                                                    <i class="ti-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-btm">
                                            <a href="{{ route('detail_product', ['slug' => $item->slug]) }}"
                                                class="d-block text-decoration-none">
                                                <h4>{{ $item->name }}</h4>
                                            </a>
                                            <div class="mt-3">
                                                <span
                                                    class="mr-4">{{ number_format($item->price, 0, '', ',') }}
                                                    đ</span>
                                                <del>{{ number_format($item->sale, 0, '', ',') }}
                                                    đ</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Danh Mục</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach ($category as $cate)
                                        <li>
                                            <a class="text-decoration-none"
                                                href="/shop?category={{ $cate->id }}">{{ $cate->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Thương hiệu</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach ($brand as $brand)
                                        <li>
                                            <a class="text-decoration-none"
                                                href="/shop?brand={{ $brand->id }}">{{ $brand->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
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
