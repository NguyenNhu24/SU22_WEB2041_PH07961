<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="" type="image/png" />
    <title>Chi tiết sản phẩm</title>
    @include('clients.layouts.style')
    @include('sweetalert::alert')
</head>

<body>
    @include('clients.layouts.header')

    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2 class="font-weight-bold">Chi tiết sản phẩm</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('homepage') }}" class="text-decoration-none">Trang chủ</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="product">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="product_img">
                        <img class=" w-100" src={{ asset('uploads/' . $product->image) }} alt="" />
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <h2 class="text-dark py-2">{{ number_format($product->price, 0, '', ',') }} đ</h2>
                        <ul class="list">
                            <li>
                                <a class="text-decoration-none" href="/shop?category={{ $product->category->id }}">
                                    <span>Danh mục</span> : {{ $product->category->name }}</a>
                            </li>
                            <li>
                                <a class="text-decoration-none" href="/shop?brand={{ $product->brand->id }}">
                                    <span>Thương hiệu</span> : {{ $product->brand->name }}</a>
                            </li>
                        </ul>
                        <p>
                            {{ $product->desc }}
                        </p>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                class="input-text qty" />
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                class="increase items-count" type="button">
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                class="reduced items-count" type="button">
                                <i class="lnr lnr-chevron-down"></i>
                            </button>
                        </div>
                        @if (!Auth::check())
                            <p>Đăng nhập để mua hàng</p>
                        @elseif(Auth::check())
                            <div class="card_area">
                                <a class="btn btn-success" onclick="addCart()"
                                    href="/addcart?product_id={{ $product->id }}&quantity=1&status=0&price={{ $product->price }}">
                                    Add to Cart
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product_description_area">
        <div class="container">
            <h2 class="py-5">Comments</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="comment_list">
                        @foreach ($product->comment as $comment)
                            <div class="">
                                <div class="">
                                    @if ($comment->user_id)
                                        <h6>{{ $comment->user->name }}</h6>
                                    @endif

                                    <p>{{ $comment->created_at->format('Y-m-d') }}</p>
                                </div>
                                <p>
                                    {{ $comment->content }}
                                </p>
                            </div>
                            <hr />
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="review_box">
                        @if (!Auth::check())
                            <p>Đăng nhập để viết bình luận</p>
                        @elseif(Auth::check())
                            <form class="row contact_form" method="post"
                                action="/addcomment?product_id={{ $product->id }}" id="contactForm"
                                novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="id" value={{ $product->slug }}>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" id="message" rows="1" placeholder="Comments"></textarea>
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
            </div>
        </div>

    </section>

    <script>
        function addCart() {
            alert("Đã thêm vào giỏ hàng");
        }
    </script>
    @include('clients.layouts.footer')
    @include('clients.layouts.script')
</body>

</html>
