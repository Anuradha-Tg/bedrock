<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFeatureData extends Model
{
    protected $table = 'room_feature_data';

    protected $fillable = [
        'room_id',
        'feature_id',
    ];

    // Define the relationship with the Rooms model
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id'); // Update to Rooms
    }

    public function feature()
    {
        return $this->belongsTo(RoomFeature::class, 'feature_id');
    }
}
