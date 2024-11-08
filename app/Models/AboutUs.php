<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';
    public $timestamps = true;


    protected $fillable = [
        'heading_en',
        'description_en',
    ];

}
