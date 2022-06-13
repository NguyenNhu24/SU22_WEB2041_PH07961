@extends('admin.layouts.main')
@section('title')
    Bình luận
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Bình luận</li>
            <li class="breadcrumb-item"><a href="{{ route('comment.index') }}"> Bình luận sản phẩm</a>
            </li>
        </ol>
    </nav>
    @if (!empty($comment))
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>#</th>
                        <th>Nội dung</th>
                        <th>Người bình luận</th>
                        <th>Sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Hành động</th>
                    </thead>
                    <tbody>
                        @foreach ($comment as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td><img src="{{ asset('uploads/' . $item->product->image) }}" width="100" height="70"
                                        alt="">
                                </td>
                                <td>
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
                                                        action="{{ route('comment.remove', ['id' => $item->id]) }}">
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
