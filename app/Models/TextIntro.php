<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextIntro extends Model
{
    use HasFactory;

    protected $table = 'text_intros';

    protected $fillable = [
        'title_intro', 'body_intro', 'title_intro_en', 'body_intro_en', 'slug', 'is_active', 'category_id', 'user_id'
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
