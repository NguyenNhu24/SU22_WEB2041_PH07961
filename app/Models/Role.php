<?php

namespace App\Models;

use App\Model\User;
use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
        protected $fillable = [
        'name',
        'guard_name',
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'role_id');
    }
}