@extends('admin.layouts.main')
@section('content')
    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Sản phẩm</li>
            <li class="breadcrumb-item"><a href="{{ route('brand.index') }}"> Danh sách thương hiệu sản phẩm</a>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <th>ID</th>
                        <th>Tên thương hiệu</th>
                        <th>Slug</th>
                        <th>
                            <a href="{{ route('brand.add') }}" class="btn btn-sm btn-success">Thêm mới</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($brands as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="{{ route('brand.edit', ['brand' => $item->id]) }}"
                                        class="btn btn-circle btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('brand.remove', ['id' => $item->id]) }}"
                                        class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                                        data-target="#confirm_delete_{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
                                                    <p>Xóa thương hiệu sẽ mất hết dữ liệu sản phẩm của thương hiệu này</p>
                                                    <p>Bạn có muốn xóa?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancel</button>

                                                    <form method="GET"
                                                        action="{{ route('brand.remove', ['id' => $item->id]) }}">
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
    </div>
@endsection
