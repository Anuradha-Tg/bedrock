<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AllCategory;
use App\Models\MainSlider;
use App\Models\Summary;
use App\Models\StayHome;
use App\Models\RoomHome;
use App\Models\FoodHome;
use App\Models\ExperienceList;
use App\Models\Rooms;
use App\Models\GalleryCategory;
use App\Models\ContactUsDetail;
use App\Models\Country;
use App\Models\GalleryImages;
use App\Models\Promotion;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function index()
    {
        $sliders = MainSlider::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->get();

        $introduction = Summary::first();

        $stay = StayHome::first();

        $roomContent = RoomHome::first();

        $roomTypeDetails = Rooms::where('status', 'Y')
        ->where('is_delete', 0)
        ->where('checkbox', 1)
        ->orderBy('id', 'ASC')
        ->get();

        $today = Carbon::today()->format('d-m-Y'); // Format for comparison

        // \DB::enableQueryLog();
        $promotion = Promotion::where('checkbox', 1)
            ->where('status', 'Y')
            ->where('is_delete', 0)
            ->whereRaw("STR_TO_DATE(date_to, '%d-%m-%Y') >= STR_TO_DATE(?, '%d-%m-%Y')", [$today]) // Convert to date for comparison
            ->orderBy('date_from', 'DESC')
            ->select('id', 'home_image1', 'home_title', 'home_content')
            ->first();

        // dd(\DB::getQueryLog());

        // dd($promotion);
        if (!empty($promotion)) {
            $contentToShow = $promotion;
        } else {
            $rooms = RoomHome::select('subheading', 'subdescription', 'image1')->first();
            $contentToShow = $rooms;
            // dd($promotion);


        }



        $food = FoodHome::first();

        $experience = ExperienceList::where('checkbox', 1)->where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->select('home_image1', 'home_title', 'home_content', 'order')->get();

        $galleryCategories = GalleryCategory::with(['images' => function ($query) {
            $query->orderBy('image_order', 'ASC');
        }])
            ->where('is_delete', 0)
            ->get();


        $foodImages = GalleryImages::where('category_id', 2)->orderBy('image_order', 'ASC')->get();
        $hotelImages = GalleryImages::where('category_id', 1)->orderBy('image_order', 'ASC')->get();
        $experienceImages = GalleryImages::where('category_id', 3)->orderBy('image_order', 'ASC')->get();


        // dd(\DB::getQueryLog());
        // dd($galleryCategories);

        $allImages = AllCategory::where('checkbox', 1)->OrderBy('order', 'ASC')->get();


        $country = Country::get();



        $contactDetails = ContactUsDetail::first();
        // dd($testimonials);



        // dd($roomDetails);

        return view('frontend.home', compact(
            'sliders',
            'introduction',
            'stay',
            'promotion',
            'contentToShow',
            'food',
            'experience',
            'galleryCategories',
            'allImages',
            'contactDetails',
            'roomContent',
            'roomTypeDetails',
            'hotelImages',
            'foodImages',
            'experienceImages','country'
        ));
    }
}
