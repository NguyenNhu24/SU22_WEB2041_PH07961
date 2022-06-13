@extends('admin.layouts.main')
@section('title')
    Thêm bài viết
@endsection
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Bài viết</li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Danh sách bài viết</a> </li>
            <li class="breadcrumb-item">Thêm mới bài viết</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới bài viết</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên tin tức</label>
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
                        <label for="">Nội dung tin</label>
                        <textarea name="content" rows="9" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày đăng tin</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- <div class="container">
    <h3 class="text-left">CẬP NHẬT TIN TỨC</h3>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên tin tức</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Ảnh tin tức</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nội dung tin</label>
            <textarea name="content" rows="9" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Ngày đăng tin</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
            <a href="{{ route('post.index') }}" class="btn btn-sm btn-danger">Hủy</a>
        </div>
    </form>
</div> --}}
