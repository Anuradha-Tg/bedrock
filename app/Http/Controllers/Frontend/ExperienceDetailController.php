<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUsDetail;
use App\Models\ExperienceContent;
use App\Models\ExperienceList;
use App\Models\TopBanner;



class ExperienceDetailController extends Controller
{
    public function index()
    {
        $topBanner = TopBanner::where('id', 1)->first();

        $experience = ExperienceContent::first();

        $experienceDetail = ExperienceList::where('status', 'Y')->where('is_delete', 0)->orderBy('order', 'ASC')->select('heading', 'description', 'image1')->paginate(8);

        $contactDetails = ContactUsDetail::first();



        return view('frontend.experience', compact('topBanner', 'experience', 'experienceDetail','contactDetails'));
    }
}
