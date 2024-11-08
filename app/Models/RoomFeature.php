<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFeature extends Model
{
    use HasFactory;

    protected $table = 'room_feature';
    public $timestamps = true;

    protected $fillable = [
        'feature_name',
        'icon1',
        'icon2',
        'order'


    ];
    public function roomFeatures()
    {
        return $this->hasMany(RoomFeatureData::class, 'feature_id'); // This shows that a feature can belong to many rooms
    }
}
