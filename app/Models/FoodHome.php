<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodHome extends Model
{
    use HasFactory;

    protected $table = 'food_home';
    public $timestamps = true;

    protected $fillable = [
        'heading',
        'description',
        'image1', // New column
        'image2', // New column
        'image3',
        'image4', // New column
        'image5', // New column
        'image6', // New column
    ];
}
