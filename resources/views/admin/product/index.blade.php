@extends('admin.layouts.main')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Sản phẩm </li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Danh sách sản phẩm </a> </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{ route('product.add-product') }}" class="btn btn-success  ">
                <span class="text">Thêm mới</span>
            </a>
        </div>
    @section('search-form')
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="{{ route('product.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control bg-light  small" placeholder="Tìm kiếm..." aria-label="Search"
                    aria-describedby="basic-addon2" name="keyword" value="{{ old('keyword') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    @endsection
    @if (!empty($product))
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>#</td>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá</th>
                            <th>Giá Sale</th>
                            <th>Mô tả</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset('uploads/' . $item->image) }}" width="100" height="100" alt="">
                                </td>
                                <td>{{ number_format($item->price, 0, '', ',') }}đ</td>
                                <td>{{ number_format($item->sale, 0, '', ',') }}đ</td>
                                <td>{{ $item->desc }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->brand->name }}</td>
                                <td>
                                    <a href="{{ route('product.edit', ['id' => $item->id]) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas  fa-edit"></i>
                                    </a>
                                    <a data-toggle="modal" class="btn btn-danger btn-circle btn-sm"
                                        data-target="#confirm_delete_{{ $item->id }}"><i
                                            class="fas fa-trash"></i></a>

                                    <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc muốn xóa không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form method="GET"
                                                        action="{{ route('product.remove', ['id' => $item->id]) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h2>Không có dữ liệu</h2>
    @endif
</div>
@endsection
