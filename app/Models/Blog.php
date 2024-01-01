<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'title', 'title_en', 'slug', 'body', 'body_en', 'image_blog', 'is_active', 'category_id', 'views', 'user_id', 'tanggal'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    protected $dates = ['tanggal'];
}
