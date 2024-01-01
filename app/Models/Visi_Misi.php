<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi_Misi extends Model
{
    use HasFactory;
    protected $table = 'visi_misis';

    protected $fillable = [
        'title', 'title_en', 'body', 'body_en', 'slug', 'is_active', 'category_id', 'user_id'
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
