<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopBanner extends Model
{
    use HasFactory;

    protected $table = 'top_banners';
    public $timestamps = true;


    protected $fillable = [
        'page_name',
        'heading',
        'banner_image'
    ];

}
