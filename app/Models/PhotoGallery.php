<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $table = 'photo_gallery';

    protected $fillable = [
        'title_photo', 'title_photo_en', 'slug', 'body', 'body_en', 'is_active', 'category_id', 'views', 'user_id', 'image_gallery'
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
}
