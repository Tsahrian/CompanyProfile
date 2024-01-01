<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    use HasFactory;

    protected $table = 'image_slider';

    protected $fillable = [
        'title_slider', 'title_slider_en', 'slug', 'body', 'body_en', 'is_active', 'category_id', 'views', 'user_id', 'images_slider'
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
