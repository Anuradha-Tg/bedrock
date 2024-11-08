<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryVideos extends Model
{
    use HasFactory;

    protected $table = 'videos';
    public $timestamps = true;

    protected $fillable = ['category_id', 'video_name', 'video', 'order'];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }
}
