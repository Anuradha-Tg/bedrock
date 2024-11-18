<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\AboutUsWhoWeAre;
use Illuminate\Http\Request;

class WhoWeAreController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:who-we-are-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = AboutUsWhoWeAre::first();

        if (!$data) {
            $data = AboutUsWhoWeAre::create([
                'description' => '',
                'image1' => '',
                'image2' => '',
                'image3' => ''
            ]);
        }

        return view('adminpanel.about_us.who_we_are.index', compact('data'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);

        if (!$request->file('image1') == "") {

            $image1 = $request->file('image1')->getClientOriginalName();

            $image1Path = $request->file('image1')->store('public/about_us_images');
        } else {
            $path = "";
        }

        if(!$request->file('image2')==""){
            $image2 = $request->file('image2')->getClientOriginalName();
            $image2Path = $request->file('image2')->store('public/about_us_images');
        }else{
            $path ="";
        }

        if(!$request->file('image3')==""){
            $image3 = $request->file('image3')->getClientOriginalName();
            $image3Path = $request->file('image3')->store('public/about_us_images');
        }else{
            $path="";
        }

        $data =  AboutUsWhoWeAre::find($request->id);
        $data->description = $request->description;
        if (!empty($image1Path)) {
            $data->image1 = $image1Path;
        }
        if (!empty($image2Path)) {
            $data->image2 = $image2Path;
        }
        if (!empty($image3Path)) {
            $data->image3 = $image3Path;
        }
        
        $data->save();

        // \LogActivity::addToLog('Who we are record updated.');

        return redirect()->route('who-we-are-edit')
            ->with('success', 'Who we are record updated successfully.');
    }
}
