<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AllCategory;
use App\Models\ContactUsDetail;
use App\Models\GalleryCategory;
use App\Models\TopBanner;



class GalleryController extends Controller
{
    public function index()
    {
        $topBanner = TopBanner::where('id', 5)->first();

        $galleryCategories = GalleryCategory::where('status', 'Y')
            ->where('is_delete', 0)
            ->with(['images' => function ($query) {
                $query->orderBy('image_order', 'ASC');
            }])->get();

        $allImages = AllCategory::orderBy('order', 'ASC')->get();

        $contactDetails = ContactUsDetail::first();

        // dd($allImages);


        return view('frontend.gallery', compact('topBanner', 'galleryCategories', 'allImages', 'contactDetails'));
    }
}
