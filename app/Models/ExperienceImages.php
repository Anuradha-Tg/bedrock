<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceImages extends Model
{
    use HasFactory;

    protected $table = 'experience_images';
    public $timestamps = true;

    protected $fillable = ['experience_id', 'image_name', 'order'];

    public function category()
    {
        return $this->belongsTo(Experience::class);
    }
}
