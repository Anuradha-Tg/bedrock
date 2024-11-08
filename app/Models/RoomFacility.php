<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    use HasFactory;

    protected $table = 'room_facility';
    public $timestamps = true;

    protected $fillable = [
        'facility_name',
        'check'
       
      
    ];
    public function roomFacilities()
    {
        return $this->hasMany(RoomFacilityData::class, 'facility_id'); // This shows that a facility can belong to many rooms
    }
}
