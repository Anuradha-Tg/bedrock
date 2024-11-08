<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceList extends Model
{
    use HasFactory;

    protected $table = 'experience';
    public $timestamps = true;

    protected $fillable = [
        'heading',
        'description',
        'image1', // New colum
        'home_image1', // New column
        'home_title',
        'home_content',
        'checkbox',
        'order',
        'status',
        'is_delete'

    ];
}
