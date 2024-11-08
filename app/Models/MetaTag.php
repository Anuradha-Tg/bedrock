<?php

namespace App\Models;

use App\Traits\ModelActions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetaTag extends Model
{
    use HasFactory,ModelActions;

    protected $fillable = [
        // 'request_id',
        'page_name',
        'page_title',
        'description',
        'keywords',
        'og_title',
        'og_type',
        'og_tag',
        'og_url',
        'og_image',
        'og_sitename',
        'og_description',
        'og_email',
        'order',
        'status',
      
    ];

}
