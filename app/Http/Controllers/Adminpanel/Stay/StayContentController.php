<?php

namespace App\Http\Controllers\Adminpanel\Stay;

use App\Http\Controllers\Controller;
use App\Models\StayContent;
use Illuminate\Http\Request;

class StayContentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:room-content-edit', ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $data = StayContent::first();

        if (!$data) {
            $data = StayContent::create([
                'heading' => '',
                'description' => '',
                'image1' => '',
                'image2' => '',
                'image3' => '',
            ]);
        }

        return view('adminpanel.stay.content.index', compact('data'));
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

            $imagePath = $request->file('image1')->store('public/room_content_images');
        } else {
            $path = "";
        }

        if (!$request->file('image2') == "") {

            $img = $request->file('image2')->getClientOriginalName();

            $imagePath = $request->file('image2')->store('public/room_content_images');
        } else {
            $path = "";
        }

        if (!$request->file('image3') == "") {

            $img = $request->file('image3')->getClientOriginalName();

            $imagePath = $request->file('image3')->store('public/room_content_images');
        } else {
            $path = "";
        }



        $data = StayContent::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;


        // Handle image uploads
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1')->store('public/room_content_images');
            $data->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2')->store('public/room_content_images');
            $data->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3')->store('public/room_content_images');
            $data->image3 = $image3;
        }



        $data->save();

        \LogActivity::addToLog('Room Content record updated.');

        return redirect()->route('room-content-edit')
            ->with('success', 'Room Content updated successfully.');
    }
}
