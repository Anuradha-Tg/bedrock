<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllCategory extends Model
{
    use HasFactory;

    protected $table = 'all_category';
    public $timestamps = true;

    protected $fillable = [
        'image', // New colum
        'order',
        'checkbox',

    ];
}
