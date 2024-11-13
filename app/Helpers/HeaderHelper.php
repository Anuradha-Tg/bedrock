<?php


namespace App\Helpers;


use App\Models\MetaTag;

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

    public static function getRoomDetail($room, $page)
    {
        // dd($page);
        // \DB::enableQueryLog();
        $meta = MetaTag::where('status', 'Y')
            ->where('room_name', $room)
            ->where('page_name', $page)
            ->first();

            // dd(\DB::getQueryLog());
        // dd($meta);

        return $meta;
    }
}
