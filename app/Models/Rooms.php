<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description1',
        'description2',
        'room_size',
        'rooms_bed',
        'occupancy',
        'home_image1', // New column
        'home_title',
        'home_content',
        'checkbox',
        'status',
        'is_delete'

    ];
    public function features()
    {
        return $this->hasMany(RoomFeatureData::class, 'room_id', 'id');
    }

    public function facilities()
    {
        return $this->hasMany(RoomFacilityData::class, 'room_id');
    }

    public function room_images()
    {
        return $this->hasMany(RoomImages::class, 'room_id');// Reference the correct model
    }
}
