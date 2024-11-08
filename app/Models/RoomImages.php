<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImages extends Model
{
    use HasFactory;

    protected $table = 'room_images';
    public $timestamps = true;

    protected $fillable = ['room_id', 'image_name', 'order'];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
}
