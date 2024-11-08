<?php


namespace App\Helpers;

use App\Models\FacilitiesService;
use Request;
use App\Models\MetaTag;
use App\Models\SurgeryType;

class HeaderHelper
{

    public static function getMeta($page)
    {
        // dd($page);
        $meta = MetaTag::where('status', 'Y')
            ->where('page_name', $page)
            ->first();

        // dd($meta);

        return $meta;
    }
}
