<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsWhoWeAre extends Model
{
    use HasFactory;

    protected $table = 'about_us_who_we_are';
    public $timestamps = true;


    protected $fillable = [
        'description',
        'image1',
        'image2',
        'image3'
    ];

}
