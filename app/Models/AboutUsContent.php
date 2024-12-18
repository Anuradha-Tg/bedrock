<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsContent extends Model
{
    use HasFactory;

    protected $table = 'about_us_content';
    public $timestamps = true;


    protected $fillable = [
        'heading',
        'description',
        'image1'
    ];

}
