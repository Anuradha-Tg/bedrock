<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUsDetail;
use App\Models\Promotion;
use App\Models\RoomFacilityData;
use App\Models\RoomFeatureData;
use App\Models\Rooms;
use App\Models\StayContent;
use App\Models\StayFeatures;
use App\Models\TopBanner;
use Carbon\Carbon;


class RoomController extends Controller
{
    public function index()
    {
        $topBanner = TopBanner::where('id', 2)->first();

        $room = StayContent::first();

        $features = StayFeatures::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();

        $contactDetails = ContactUsDetail::first();

        $today = Carbon::today()->format('d-m-Y');
        $promotion = Promotion::where('status', 'Y')
            ->where('is_delete', 0)
            ->whereRaw("STR_TO_DATE(date_to, '%d-%m-%Y') >= STR_TO_DATE(?, '%d-%m-%Y')", [$today]) // Convert to date for comparison
            ->orderBy('date_from', 'DESC')
            ->select('heading', 'description', 'image')->get();


        // \DB::enableQueryLog();
        //         $roomDetails = Rooms::with(['features.feature' => function ($query) {
        //                 $query->orderBy('order', 'ASC'); // Order the related features by 'order'
        //             }])
        //             ->where('status', 'Y')
        //             ->where('is_delete', 0)
        //             ->orderBy('id', 'ASC')
        //             ->get();

        // dd(\DB::getQueryLog());
        // $roomFeatures = RoomFeatureData::orderBy('id', 'ASC')->limit(3)->get();
        $roomDetails = Rooms::where('status', 'Y')
        ->where('is_delete', 0)
        ->with(['room_images' => function ($query) {
            $query->orderBy('order', 'ASC');
        }])
        ->orderBy('id', 'ASC')->get();

        // dd($roomDetails);

        $roomFeatureDetails = RoomFeatureData::select('room_feature_data.id', 'room_feature.feature_name', 'room_feature.icon1', 'room_feature_data.room_id')
            ->join('room_feature', 'room_feature.id', '=', 'room_feature_data.feature_id')
            ->whereIn('room_feature_data.room_id', $roomDetails->pluck('id')) // Get the features for the fetched rooms
            ->orderBy('room_feature.order', 'ASC')
            ->get();


        return view('frontend.room', compact('topBanner', 'room', 'features', 'contactDetails', 'promotion', 'roomDetails','roomFeatureDetails'));
    }

    public function RoomDetail($id)
    {
        $topBanner = TopBanner::where('id', 4)->first();

        // \DB::enableQueryLog();

        // $roomDetails = Rooms::with(['features.feature' => function ($query) {
        //     $query->orderBy('order', 'ASC'); // Order the related features by 'order'
        // }])
        //     ->where('id', $id)
        //     ->where('status', 'Y')
        //     ->where('is_delete', 0)
        //     ->first();

        $roomDetails = Rooms::where('status', 'Y')->where('is_delete', 0)
        ->where('id', $id)
        ->with(['room_images' => function ($query) {
            $query->orderBy('order', 'ASC');
        }])
        ->first();

        $roomFeatureDetails = RoomFeatureData::select('room_feature_data.id', 'room_feature.feature_name', 'room_feature.icon2')
            ->join('room_feature', 'room_feature.id', '=', 'room_feature_data.feature_id')
            ->where('room_feature_data.room_id', $id)
            ->orderBy('room_feature.order', 'ASC')
            ->get();
//  \DB::enableQueryLog();
            $roomFacilityDetails = RoomFacilityData::select('room_facility_data.id', 'room_facility.facility_name')
            ->join('room_facility', 'room_facility.id', '=', 'room_facility_data.facility_id')
            ->where('room_facility_data.room_id', $id)
            ->orderBy('room_facility.id', 'ASC')
            ->get();

        // dd($roomFeatureDetails);

        // dd(\DB::getQueryLog());


        $contactDetails = ContactUsDetail::first();


        return view('frontend.rooms', compact('topBanner', 'roomDetails', 'contactDetails', 'roomFeatureDetails','roomFacilityDetails'));
    }
}
