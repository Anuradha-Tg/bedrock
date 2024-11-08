<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StayFeatures extends Model
{
    use HasFactory;

    protected $table = 'stay_features';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'icon',
        'order',
        'status',
        'is_delete' // New column
    ];
}
