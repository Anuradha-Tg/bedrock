<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiries';
    public $timestamps = true;


    protected $fillable = [
        'full_name',
        'email',
        'check_in',
        'check_out',
        'country',
        'message'
    ];

}
