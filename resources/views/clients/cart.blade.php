<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Sản phẩm</title>
    @include('clients.layouts.style')
</head>

<body>
    @include('clients.layouts.header')
    <div class="container card-body">
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread font-weight-bold mb-3">Quản lý đơn hàng</h2>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{ route('homepage') }}" class="text-decoration-none text-dark">
                                Trang Chủ
                            </a>
                        </span>/
                        <span>Quản Lý Đơn Hàng</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Hành động</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td><img src="{{ asset('uploads/' . $item->product->image) }}" width="70" height="70" alt="">
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->total_price, 0, '', ',') }}đ</td>
                        <td>
                            <a data-toggle="modal" class="btn btn-danger text-white"
                                data-target="#confirm_delete_{{ $item->id }}">Xóa</a>

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
                                                action="{{ route('cart.remove', ['id' => $item->id]) }}">
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
            <div class="blockquote">Tổng tiền: {{ number_format($total, 0, '', ',') }}đ</div>
        </div>
    </div>

    @include('clients.layouts.footer')
    @include('clients.layouts.script')
</body>

</html>
