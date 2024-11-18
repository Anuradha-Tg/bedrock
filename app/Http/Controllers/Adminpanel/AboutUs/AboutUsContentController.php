<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\AboutUsContent;
use Illuminate\Http\Request;

class AboutUsContentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:about-us-content-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = AboutUsContent::first();

        if (!$data) {
            $data = AboutUsContent::create([
                'heading' => '',
                'description' => '',
                'image1' => ''
            ]);
        }

        return view('adminpanel.about_us.content.index', compact('data'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'


        ]);

        if (!$request->file('image1') == "") {

            $image1 = $request->file('image1')->getClientOriginalName();

            $image1Path = $request->file('image1')->store('public/about_us_images');
        } else {
            $path = "";
        }

        $data =  AboutUsContent::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1')->store('public/about_us_images');
            $data->image1 = $image1;
        }
       
        $data->save();

        // \LogActivity::addToLog('Who we are record updated.');

        return redirect()->route('about-us-content-edit')
            ->with('success', 'About Us Content record updated successfully.');
    }
}
