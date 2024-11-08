<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
    use HasFactory;

    protected $table = 'images';
    public $timestamps = true;

    protected $fillable = ['category_id', 'image_name', 'image_order'];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }
}
