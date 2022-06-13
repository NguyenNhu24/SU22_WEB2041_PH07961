@extends('admin.layouts.main')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Sản phẩm</li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Danh sách sản phẩm</a> </li>
            <li class="breadcrumb-item">Thêm mới sản phẩm</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold ">Thêm mới sản phẩm</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" value="{{ asset('image') }}">
                            <label class="custom-file-label" for="customFile">Chọn ảnh ...</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="float" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input type="float" name="sale" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <textarea name="desc" id="desc" rows="7" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="custom-select">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Thương hiệu</label>
                        <select name="brand_id" class="custom-select">
                            @foreach ($brand as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary">Thêm</button>
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
