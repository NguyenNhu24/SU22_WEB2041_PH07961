<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\SaveEditUserRequest;
use App\Http\Requests\SaveAddUserRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role as ContractsRole;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    public function add()
    {
        $user = User::with('role')->get();
        $role = Role::all();
        return view('admin.users.add', ['user' => $user], compact('role'));
    }

    public function saveAdd(SaveAddUserRequest $request)
    {
        $model = new User();
        $model->fill($request->all());
        $model->password = Hash::make($request->pasword);
        $model->save();

        return redirect(route('users.index'));
    }
    public function edit($id)
    {
        $model = User::find($id);
        $role = Role::all();
        if (!$model) return redirect(route('admin.users.index'));

        return view('admin.users.edit', ['model' => $model], compact('role'));
    }

    public function saveEdit($id, SaveEditUserRequest $request)
    {
        $model = User::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect(route('users.index'));
    }
    public function remove($id)
    {
        User::destroy($id);
        return redirect(route('users.index'));
    }
}
