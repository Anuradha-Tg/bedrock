<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StayHome extends Model
{
    use HasFactory;

    protected $table = 'stay_home';
    public $timestamps = true;


    protected $fillable = [
        'image1',
        'image2',
        'image3',
        'icon1',
        'icon2',
        'icon3',
        'icon1_title',
        'icon2_title',
        'icon3_title',

        
    ];

}
