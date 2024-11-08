<?php

namespace App\Http\Controllers\Adminpanel\Experience;

use App\Http\Controllers\Controller;
use App\Models\ExperienceContent;
use Illuminate\Http\Request;


class ExperienceContentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:experience-content-edit', ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $data = ExperienceContent::first();

        if (!$data) {
            $data = ExperienceContent::create([
                'heading' => '',
                'description' => '',
                'image1' => '',
                'image2' => '',
                'image3' => '',
            ]);
        }

        return view('adminpanel.experience.content.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$request->file('image1') == "") {

            $img = $request->file('image1')->getClientOriginalName();

            $imagePath = $request->file('image1')->store('public/experience_content_images');
        } else {
            $path = "";
        }

        if (!$request->file('image2') == "") {

            $img = $request->file('image2')->getClientOriginalName();

            $imagePath = $request->file('image2')->store('public/experience_content_images');
        } else {
            $path = "";
        }

        if (!$request->file('image3') == "") {

            $img = $request->file('image3')->getClientOriginalName();

            $imagePath = $request->file('image3')->store('public/experience_content_images');
        } else {
            $path = "";
        }



        $data = ExperienceContent::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;


        // Handle image uploads
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1')->store('public/experience_content_images');
            $data->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2')->store('public/experience_content_images');
            $data->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3')->store('public/experience_content_images');
            $data->image3 = $image3;
        }



        $data->save();

        \LogActivity::addToLog('Experience Content record updated.');

        return redirect()->route('experience-content-edit')
            ->with('success', 'Content updated successfully.');
    }
}
