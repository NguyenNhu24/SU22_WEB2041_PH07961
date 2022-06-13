@extends('admin.layouts.main')
@section('title')
    Dashboard
@endsection
@section('css')
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb d-flex justify-content-between">
            <li class="dropdown">
                <a class="nav-link" href="#">
                    Thống kê
                </a>
            </li>
            <li class="dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         document.getElementById('logout-form').submit();">
                        {{ __('Đăng xuất') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('homepage') }}" document.getElementById('#admin').submit();">
                        {{ __('Trang chủ') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <form id="admin" action="{{ route('homepage') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ol>


    </nav>

    <div class="row">
        <?php
        $product = DB::table('products')->count();
        $category = DB::table('categories')->count();
        $brand = DB::table('brands')->count();
        $cart = DB::table('shopping_carts')->count();
        $comment = DB::table('comments')->count();
        $blog = DB::table('post')->count();
        ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $product }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Bài viết</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $blog }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Bình luận</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $comment }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Đơn hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cart }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('js')
    <script src="https://cdn.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/serial.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/maps/js/worldLow.js"></script>
@endsection
