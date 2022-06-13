@extends('admin.layouts.main')
@section('title')
    Cập nhật bài viết
@endsection
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Bài viết</li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Danh sách bài viết</a> </li>
            <li class="breadcrumb-item">Cập nhật bài viết</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold ">Cập nhật bài viết</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('post.update', ['id' => $Post]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ $Post->name }}">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" value="">
                            <label class="custom-file-label" for="customFile">Chọn ảnh ...</label>
                            <div>
                                <div class="mt-2">
                                    @if ($Post->image)
                                        <img src="{{ asset('uploads/' . $Post->image) }}" width="70px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <textarea name="desc" id="content" rows="7" class="form-control">{{ $Post->content }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                        <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
