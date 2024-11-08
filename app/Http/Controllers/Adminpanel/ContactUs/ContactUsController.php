<?php

namespace App\Http\Controllers\Adminpanel\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactUsDetail;
use Illuminate\Http\Request;
use DataTables;

class ContactUsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:contact-us-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = ContactUsDetail::first();

        if (!$data) {
            $data = ContactUsDetail::create([
            'contact_no' => '',
            'hotline' => '',
            'email' => '',
            'address' => '',
            'map' => '',
            'twitter_url' => '',
            'youtube_url' => '',
            'banking1' => '',
            'banking2' => '',


            ]);
        }

        return view('adminpanel.contactusdetails.contactus.index', compact('data'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'contact_no' => 'required',
            'email' => 'required',
            'address' => 'required',

        ]);

        $data =  ContactUsDetail::find($request->id);
        $data->contact_no = $request->contact_no;
        $data->hotline = $request->hotline;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->facebook_url = $request->facebook_url;
        $data->instagram_url = $request->instagram_url;
        $data->map = $request->map;
        $data->twitter_url = $request->twitter_url;
        $data->youtube_url = $request->youtube_url;
        $data->banking1 = $request->banking1;
        $data->banking2 = $request->banking2;
        $data->save();

        \LogActivity::addToLog('Contact us record updated.');

        return redirect()->route('contact-us-edit')
            ->with('success', 'Contact us updated successfully.');
    }

}
