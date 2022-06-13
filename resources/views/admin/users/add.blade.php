@extends('admin.layouts.main')
@section('content')
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Tài khoản</li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Danh sách tài khoản</a> </li>
            <li class="breadcrumb-item">Thêm mới tài khoản </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới tài khoản</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên Tài Khoản </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên Tài Khoản">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Địa Chỉ Email </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email@example.com">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Mật Khẩu </label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="**************">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Xác Nhận Mật Khẩu </label>
                        <input type="password" class="form-control" id="passwordVerify" name="password2"
                            placeholder="**************">
                        @if ($errors->has('password2'))
                            <span class="text-danger">{{ $errors->first('password2') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Vai trò</label>
                        <select class="mt-3 form-control" name="role_id">
                            <option value="1">
                                Quản trị
                            </option>
                            <option value="0">
                                Khách hàng
                            </option>
                            @error('role_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
