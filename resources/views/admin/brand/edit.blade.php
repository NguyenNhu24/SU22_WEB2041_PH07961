@extends('admin.layouts.main')
@section('title')
    Sửa thương hiệu sản phẩm
@endsection
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Sản phẩm</li>
            <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Danh sách thương hiệu sản phẩm</a> </li>
            <li class="breadcrumb-item">Sửa thương hiệu sản phẩm</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa thương hiệu sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('brand.update', ['brand' => $brand]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Tên thương hiệu</label>
                        <input class="form-control" type="text" name="name" value="{{ $brand->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
