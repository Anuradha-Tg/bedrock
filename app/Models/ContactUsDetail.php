<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsDetail extends Model
{
    use HasFactory;

    protected $table = 'contact_us_details';
    public $timestamps = true;


    protected $fillable = [
        'contact_no',
        'hotline',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'map',
        'twitter_url',
        'youtube_url',
        'banking1',
        'banking2'
    ];

}
