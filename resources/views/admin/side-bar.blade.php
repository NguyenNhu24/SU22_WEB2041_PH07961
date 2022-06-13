@section('side-bar')

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
            <div>Logo</div>
        </a>
        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
            <a class="nav-link" href="/admin/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Thống kê</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Quản Lý
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-th-list"></i>
                <span>Sản phẩm</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ Route('category.index') }}">Danh mục sản phẩm</a>
                    <a class="collapse-item" href="{{ Route('brand.index') }}">Thương hiệu sản phẩm</a>
                    <a class="collapse-item" href="{{ Route('product.index') }}">Danh sách sản phẩm</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('cartadmin.index') }}" class="nav-link">
                <i class="fas fa-shopping-cart"></i>
                <span>Đơn hàng</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fa fa-user"></i>
                <span>Tài khoản</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('post.index') }}" class="nav-link">
                <i class="fas fa-blog"></i>
                <span>Bài viết</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                <i class="fa fa-comment"></i>
                <span>Bình luận</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('comment.index') }}">Bình luận sản phẩm</a>
                    <a class="collapse-item" href="{{ Route('commentblog.index') }}">Bình luận bài viết</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="fa fa-sign-out"></i>
                <span>Đăng xuất</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
