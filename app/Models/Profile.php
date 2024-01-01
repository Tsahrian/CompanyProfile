<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';

    protected $fillable = [
        'phone', 'address', 'email', 'category_id', 'is_active'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

}
