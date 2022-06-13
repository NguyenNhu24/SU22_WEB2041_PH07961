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
                <form action="{{ route('users.edit', ['id' => $model->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên Tài Khoản </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên Tài Khoản"
                            value="{{ old('name', $model->name) }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Địa Chỉ Email </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email@example.com"
                            value="{{ old('email', $model->email) }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Vai Trò</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role_id">
                            <option value="1" {{ old('roles', $model->role_id) == '1' ? 'selected' : '' }}>Quản Trị
                            </option>
                            <option value="0" {{ old('roles', $model->role_id) == '0' ? 'selected' : '' }}>Khách Hàng
                            </option>
                        </select>
                        @if ($errors->has('role'))
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        @endif
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
