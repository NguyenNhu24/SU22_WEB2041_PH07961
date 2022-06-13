@extends('admin.layouts.main')
@section('title')
    Cập nhật sản phẩm
@endsection
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Sản phẩm</li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Danh sách sản phẩm</a> </li>
            <li class="breadcrumb-item">Cập nhật sản phẩm</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold ">Cập nhật sản phẩm</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('product.update', ['id' => $Product]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ $Product->name }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" value="">
                            <label class="custom-file-label" for="customFile">Chọn ảnh ...</label>
                            <div>
                                <div class="mt-2">
                                    @if ($Product->image)
                                        <img src="{{ asset('uploads/' . $Product->image) }}" width="70px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="float" name="price" class="form-control" value="{{ $Product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input type="float" name="sale" class="form-control" value="{{ $Product->sale }}">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <textarea name="desc" id="desc" rows="7" class="form-control ">{{ $Product->desc }}</textarea>
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Danh mục sản phẩm</label>
                        <select class="mt-3 form-control" name="cate_id">
                            @foreach ($category as $item)
                                <option {{ $item->id == $Product->name ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                            @error('cate_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Thương hiệu sản phẩm</label>
                        <select class="mt-3 form-control" name="brand_id">
                            @foreach ($brand as $item)
                                <option {{ $item->id == $Product->name ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
