@extends('admin.layouts.main')
@section('title')
    Sửa danh mục sản phẩm
@endsection
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Sản phẩm</li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Danh sách danh mục sản phẩm</a> </li>
            <li class="breadcrumb-item">Sửa danh mục sản phẩm</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('category.update', ['Category' => $Category]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Tên danh mục</label>
                        <input class="form-control" type="text" name="name" value="{{ $Category->name }}">
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
