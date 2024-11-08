<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFacilityData extends Model
{
    protected $table = 'room_facility_data';

    protected $fillable = [
        'room_id',
        'facility_id',
    ];

    // Define the relationship with the Rooms model
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id'); // Update to Rooms
    }

    public function facility()
    {
        return $this->belongsTo(RoomFacility::class, 'facility_id');
    }
}
