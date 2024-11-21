<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUsDetail;
use App\Models\Country;
use App\Models\Inquiry;
use App\Models\TopBanner;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $topBanner = TopBanner::where('id', 3)->first();
        $contactDetails = ContactUsDetail::first();
        $country = Country::get();

        // dd($testimonials);

        return view('frontend.contact', compact('topBanner','contactDetails','country'));
    }

    public function store(Request $request) {

        $contactDetails = ContactUsDetail::first();

        $request->validate([
            'full_name' => 'required',
            'email' =>'required',
            'mobile_no' => 'required',
            'check_in' =>'required',
            'check_out' =>'required',
            'country' =>'required',
            'message' => 'required',
        ],[
            'full_name.required' => 'Full name field is required.',
            'email.required' => 'Email field is required.',
            'mobile_no.required' => 'Mobile No field is required.',
            'check_in.required' => 'check in field is required.',
            'check_out.required' => 'check out field is required.',
            'country' =>'country field is required.',
            'message.required' => 'Message is required.'
        ]);

        // dd('test34');
        // \DB::enableQueryLog();
	
        $inquiry = new Inquiry();
        $inquiry->full_name = $request->full_name;
        $inquiry->email = $request->email;
        $inquiry->mobile_no = $request->mobile_no;
        $inquiry->check_in = $request->check_in;
        $inquiry->check_out = $request->check_out;
        $inquiry->country = $request->country;
        $inquiry->message = $request->message;
        $inquiry->save();

        // dd(\DB::getQueryLog());

        \Mail::send('frontend.mail.inquirymail',
        ['inquirydetails' => $inquiry, 'contactsdetails' => $contactDetails], function($message) use($contactDetails)
        {
            $message->from('bedrockinquiries@gmail.com');
            $message->to('bedrockinquiries@gmail.com')->subject('Bedrock - New Enquiry');
        });

        return redirect()->route('contact-us')->with('success', 'Enquiry submitted successfully.');
    }


}
