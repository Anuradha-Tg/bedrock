<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomHome extends Model
{
    use HasFactory;

    protected $table = 'room_home';
    public $timestamps = true;

    protected $fillable = [
        'heading',
        'description',
        'subheading',
        'subdescription',
        'image1', // New column

    ];
}
