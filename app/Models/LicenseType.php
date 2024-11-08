<?php

namespace App\Models;

use App\Traits\ModelActions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LicenseType extends Model
{
    use HasFactory,ModelActions;

    protected $fillable = [
        // 'request_id',
        'section_type',
        'section',
        'licence_name',
        'display_order',
        'status',
        'created_at',
        'updated_at',
    ];

}
