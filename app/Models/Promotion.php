<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotion';
    public $timestamps = true;

    protected $fillable = [
        'heading',
        'description',
        'image',
        'home_image1',
        'home_title',
        'home_content',
        'checkbox', // New column
        'date_from', // New column
        'date_to',
        'status',
        'is_delete'

    ];
}
