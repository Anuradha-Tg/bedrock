<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'tbl_country';
    public $timestamps = true;


    protected $fillable = [
        'iso',
        'name',
        'printable_name',
        'iso3',
        'numcode',
        'iCountryID ',
        'vTeleCode',
        'cEnable'
    ];

}
