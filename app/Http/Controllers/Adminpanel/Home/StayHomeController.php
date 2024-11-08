<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\StayHome;
use Illuminate\Http\Request;
use DataTables;

class StayHomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:stay-home-edit', ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $data = StayHome::first();

        if (!$data) {
            $data = StayHome::create([
            'image1' => '',
            'image2' => '',
            'image3' => '',
            'icon1' => '',
            'icon2' => '',
            'icon3' => '',
            'icon1_title' => '',
            'icon2_title' => '',
            'icon3_title' => '',

            ]);
        }

        return view('adminpanel.home.stay.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon1_title' => 'required',
            'icon2_title' => 'required',
            'icon3_title' => 'required',
        ]);

        if (!$request->file('image1') == "") {

            $img = $request->file('image1')->getClientOriginalName();

            $imagePath = $request->file('image1')->store('public/room_home_images');
        } else {
            $path = "";
        }

        if (!$request->file('image2') == "") {

            $img = $request->file('image2')->getClientOriginalName();

            $imagePath = $request->file('image2')->store('public/room_home_images');
        } else {
            $path = "";
        }

        if (!$request->file('image3') == "") {

            $img = $request->file('image3')->getClientOriginalName();

            $imagePath = $request->file('image3')->store('public/room_home_images');
        } else {
            $path = "";
        }

        if (!$request->file('icon1') == "") {

            $img = $request->file('icon1')->getClientOriginalName();

            $imagePath = $request->file('icon1')->store('public/room_home_images');
        } else {
            $path = "";
        }
        if (!$request->file('icon2') == "") {

            $img = $request->file('icon2')->getClientOriginalName();

            $imagePath = $request->file('icon2')->store('public/room_home_images');
        } else {
            $path = "";
        }
        if (!$request->file('icon3') == "") {

            $img = $request->file('icon3')->getClientOriginalName();

            $imagePath = $request->file('icon3')->store('public/room_home_images');
        } else {
            $path = "";
        }

        $data = StayHome::find($request->id);
        $data->icon1_title = $request->icon1_title;
        $data->icon2_title = $request->icon2_title;
        $data->icon3_title = $request->icon3_title;

        $data->save();
      

        // Handle image uploads
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1')->store('public/room_home_images');
            $data->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2')->store('public/room_home_images');
            $data->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3')->store('public/room_home_images');
            $data->image3 = $image3;
        }

        if ($request->hasFile('icon1')) {
            $icon1 = $request->file('icon1')->store('public/room_home_images');
            $data->icon1 = $icon1;
        }
        if ($request->hasFile('icon2')) {
            $icon2 = $request->file('icon2')->store('public/room_home_images');
            $data->icon2 = $icon2;
        }
        if ($request->hasFile('icon3')) {
            $icon3 = $request->file('icon3')->store('public/room_home_images');
            $data->icon3 = $icon3;
        }

        $data->save();

        \LogActivity::addToLog('Room Home Content record updated.');

        return redirect()->route('stay-home-edit')
            ->with('success', 'Room Home Content updated successfully.');
    }
}
