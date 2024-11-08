<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\RoomHome;
use Illuminate\Http\Request;
use DataTables;

class RoomHomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:room-home-edit', ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $data = RoomHome::first();

        if (!$data) {
            $data = RoomHome::create([
                'heading' => '',
                'description' => '',
                'subheading' => '',
                'subdescription'=>'',
                'image1' => '',

                
            ]);
        }

        return view('adminpanel.home.room.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'subheading' => 'required',
            'subdescription'=>'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if (!$request->file('image1') == "") {

            $img = $request->file('image1')->getClientOriginalName();

            $imagePath = $request->file('image1')->store('public/room_home_images');
        } else {
            $path = "";
        }

       

       

        $data = RoomHome::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->subheading = $request->subheading;
        $data->subdescription = $request->subdescription;
      

        // Handle image uploads
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1')->store('public/room_home_images');
            $data->image1 = $image1;
        }

       

        $data->save();

        \LogActivity::addToLog('Room Home Content record updated.');

        return redirect()->route('room-home-edit')
            ->with('success', 'Room Home Content updated successfully.');
    }
}
