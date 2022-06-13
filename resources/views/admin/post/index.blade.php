@extends('admin.layouts.main')
@section('title')
    Danh sách bài viết
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Bài viết</li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}"> Danh sách bài viết</a>
            </li>
        </ol>
    </nav>
    <div class="card-header py-3">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <a href="{{ route('post.add-post') }}" class="btn btn-success  ">
            <span class="text">Thêm mới</span>
        </a>
    </div>
    @if (!empty($post))
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh tin</th>
                        {{-- <th>Nội dung</th> --}}
                        <th>Ngày đăng</th>
                        <th>Chức năng</th>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="width: 230px">{{ $item->name }}</td>
                                <td><img src="{{ asset('uploads/' . $item->image) }}" width="100" height="70" alt="">
                                    {{-- <td style="width: 450px">{{ $item->content }}</td> --}}
                                <td>{{ $item->date }}</td>
                                <td>
                                    <a href="{{ route('post.edit', ['id' => $item->id]) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas  fa-edit"></i>
                                    </a>
                                    <a data-toggle="modal" class="btn btn-danger btn-circle btn-sm"
                                        data-target="#confirm_delete_{{ $item->id }}"><i class="fas fa-trash"></i></a>

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
                                                        action="{{ route('post.remove', ['id' => $item->id]) }}">
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
@endsection
