<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GalleryImages; // Add this line to import the GalleryImages model

class GalleryCategory extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = true;

    protected $fillable = ['category_name', 'thumbnail', 'is_delete', 'status'];

    public function images()
    {
        return $this->hasMany(GalleryImages::class, 'category_id');// Reference the correct model
    }
}
