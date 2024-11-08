<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\FoodHome;
use Illuminate\Http\Request;

class FoodHomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:food-home-edit', ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $data = FoodHome::first();

        if (!$data) {
            $data = FoodHome::create([
                'heading' => '',
                'description' => '',
                'image1' => '',
                'image2' => '',
                'image3' => '',
                'image4' => '',
                'image5' => '',
                'image6' => '',
            ]);
        }

        return view('adminpanel.home.food.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$request->file('image1') == "") {

            $img = $request->file('image1')->getClientOriginalName();

            $imagePath = $request->file('image1')->store('public/food_home_images');
        } else {
            $path = "";
        }

        if (!$request->file('image2') == "") {

            $img = $request->file('image2')->getClientOriginalName();

            $imagePath = $request->file('image2')->store('public/food_home_images');
        } else {
            $path = "";
        }

        if (!$request->file('image3') == "") {

            $img = $request->file('image3')->getClientOriginalName();

            $imagePath = $request->file('image3')->store('public/food_home_images');
        } else {
            $path = "";
        }
        if (!$request->file('image4') == "") {

            $img = $request->file('image4')->getClientOriginalName();

            $imagePath = $request->file('image4')->store('public/food_home_images');
        } else {
            $path = "";
        }
        if (!$request->file('image5') == "") {

            $img = $request->file('image5')->getClientOriginalName();

            $imagePath = $request->file('image5')->store('public/food_home_images');
        } else {
            $path = "";
        }
        if (!$request->file('image6') == "") {

            $img = $request->file('image6')->getClientOriginalName();

            $imagePath = $request->file('image6')->store('public/food_home_images');
        } else {
            $path = "";
        }



        $data = FoodHome::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;


        // Handle image uploads
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1')->store('public/food_home_images');
            $data->image1 = $image1;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2')->store('public/food_home_images');
            $data->image2 = $image2;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3')->store('public/food_home_images');
            $data->image3 = $image3;
        }

        if ($request->hasFile('image4')) {
            $image4 = $request->file('image4')->store('public/food_home_images');
            $data->image4 = $image4;
        }

        if ($request->hasFile('image5')) {
            $image5 = $request->file('image5')->store('public/food_home_images');
            $data->image5 = $image5;
        }

        if ($request->hasFile('image6')) {
            $image6 = $request->file('image6')->store('public/food_home_images');
            $data->image6 = $image6;
        }



        $data->save();

        \LogActivity::addToLog('Food Home Content record updated.');

        return redirect()->route('food-home-edit')
            ->with('success', 'Food Home Content updated successfully.');
    }
}
