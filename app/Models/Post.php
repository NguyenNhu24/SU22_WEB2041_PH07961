<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'post';
    protected $fillable = [
        'name',
        'image',    
        'content',
        'date',
    ];
    public function comment()
    {
        return $this->hasMany(Post_Comment::class, 'post_id','slug','id');
    }
}
