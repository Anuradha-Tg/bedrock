<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomListingFeatures extends Model
{
    use HasFactory;

    protected $table = 'room_listing_features';
    public $timestamps = true;

    protected $fillable = [
        'feature_name',
        'icon',
        'order'


    ];
    public function roomListingFeatures()
    {
        return $this->hasMany(RoomListingFeaturesData::class, 'listing_feature_id'); // This shows that a feature can belong to many rooms
    }
}
