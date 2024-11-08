<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StayContent extends Model
{
    use HasFactory;

    protected $table = 'stay_content';
    public $timestamps = true;

    protected $fillable = [
        'heading',
        'description',
        'image1', // New column
        'image2', // New column
        'image3', // New column
    ];
}
