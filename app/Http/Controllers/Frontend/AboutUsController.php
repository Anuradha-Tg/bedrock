<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsContent;
use App\Models\AboutUsWhoWeAre;
use App\Models\ContactUsDetail;
use App\Models\TopBanner;



class AboutUsController extends Controller
{
    public function index()
    {
        $topBanner = TopBanner::where('id', 6)->first();

        $whoWeAre = AboutUsWhoWeAre::first();

        $aboutUsContent = AboutUsContent::first();

        $contactDetails = ContactUsDetail::first();



        return view('frontend.about_us', compact('topBanner', 'whoWeAre', 'aboutUsContent','contactDetails'));
    }
}
