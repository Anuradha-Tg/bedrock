<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use DataTables;

class AboutUsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:about-us-edit', ['only' => ['index, update']]);
    }

    public function index()
{
    $data = AboutUs::first();

    if (!$data) {
        $data = AboutUs::create([
            'heading_en' => '',
            'description_en' => '',
        ]);
    }

    return view('adminpanel.home.about_us.index', compact('data'));
}

    public function update(Request $request)
    {
        $request->validate([
            'heading_en' => 'required',
            'description_en' => 'required'
        ]);

        $data =  AboutUs::find($request->id);
        $data->heading_en = $request->heading_en;
        $data->description_en = $request->description_en;
        $data->save();

        \LogActivity::addToLog('About Us record updated.');

        return redirect()->route('about-us-edit')
            ->with('success', 'About Us updated successfully.');
    }

}
