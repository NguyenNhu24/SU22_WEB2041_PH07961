@extends('admin.layouts.main')
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dịch vụ</li>
            <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Danh sách danh mục sản phẩm</a> </li>
            <li class="breadcrumb-item">Thêm mới danh mục sản phẩm </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới danh mục sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ Route('brand.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên thương hiệu:</label>
                        <input type="text" name="name" id="" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Slug:</label>
                        <input type="text" name="slug" id="" class="form-control">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                        <a href="{{ route('brand.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
