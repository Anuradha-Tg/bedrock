<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomListingFeaturesData extends Model
{
    protected $table = 'room_listing_features_data';

    protected $fillable = [
        'room_id',
        'listing_feature_id',
    ];

    // Define the relationship with the Rooms model
    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id'); // Update to Rooms
    }

    public function listingFeatures()
    {
        return $this->belongsTo(RoomListingFeatures::class, 'listing_feature_id');
    }
}
    