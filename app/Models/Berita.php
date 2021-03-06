<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $fillable = [
        'image', 'title', 'content', 'id_category', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }

    // public function getProfilePictureAttribute($value)
    // {
    //     return url("public/image" . $value);
    // }
}
