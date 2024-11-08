<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\MainSlider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MainSliderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:main-slider-list|main-slider-create|main-slider-edit|main-slider-delete', ['only' => ['list']]);
        $this->middleware('permission:main-slider-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:main-slider-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:main-slider-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.home.main_slider.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'description_en' => 'required',
            'desktop_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'mobile_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required|in:Y,N'
        ]);

        if (!$request->file('desktop_image') == "") {

            $desktopimg = $request->file('desktop_image')->getClientOriginalName();

            $pathdesktopimg = $request->file('desktop_image')->store('public/sliderimages');
        } else {
            $path = "";
        }

        if (!$request->file('mobile_image') == "") {

            $desktopimg = $request->file('mobile_image')->getClientOriginalName();

            $pathmobileimg = $request->file('mobile_image')->store('public/sliderimages');
        } else {
            $path = "";
        }



        $slider = new MainSlider();
        $slider->title_en = $request->title_en;
        $slider->description_en = $request->description_en;
        $slider->link = $request->link;
        $slider->desktop_image = $pathdesktopimg;
        $slider->mobile_image = $pathmobileimg;
        $slider->order = $request->order;
        $slider->status = $request->status;
        $slider->save();
        $id = $slider->id;

        \LogActivity::addToLog('New main slider ' . $request->title_en . ' added(' . $id . ').');

        return redirect()->route('main-slider-list')
            ->with('success', 'Main slider created successfully.');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = MainSlider::where('is_delete', 0)->get();
            // die(var_dump($data));
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('slider_image', function ($row) {
                    $imgpath = "storage/app/$row->desktop_image";
                    $img = '<img src="' . $imgpath . '">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-main-slider/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function ($row) {
                    if ($row->status == "Y")
                        $status = 'fa fa-check';
                    else
                        $status = 'fa fa-remove';

                    $btn = '<a href="changestatus-main-slider/' . $row->id . '/' . $row->cEnable . '"><i class="' . $status . '"></i></a>';

                    return $btn;
                })
                ->addColumn('blockmainslider', 'adminpanel.home.main_slider.actionsBlock')
                ->rawColumns(['slider_image', 'edit', 'activation', 'blockmainslider'])
                ->make(true);
        }

        return view('adminpanel.home.main_slider.list');
    }

    public function edit($id)
    {
        $mainSliderID = decrypt($id);
        $data = MainSlider::find($mainSliderID);

        return view('adminpanel.home.main_slider.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'description_en' => 'required',
            'desktop_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'mobile_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            // 'status' => 'required|in:Y,N'
        ]);

        if ($request->hasFile('desktop_image')) {

            $desktopimg = $request->file('desktop_image')->getClientOriginalName();

            $pathdesktopimg = $request->file('desktop_image')->store('public/sliderimages');
        }

        if ($request->hasFile('mobile_image')) {

            $desktopimg = $request->file('mobile_image')->getClientOriginalName();

            $pathmobileimg = $request->file('mobile_image')->store('public/sliderimages');
        }
        $data =  MainSlider::find($request->id);
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        $data->link = $request->link;
        if (!empty($pathdesktopimg)) {
            $data->desktop_image = $pathdesktopimg;
        }
        if (!empty($pathmobileimg)) {
            $data->mobile_image = $pathmobileimg;
        }
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Main slider record ' . $data->title_en . ' updated(' . $id . ').');

        return redirect()->route('main-slider-list')
            ->with('success', 'Main slider updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  MainSlider::find($request->id);

        if ($data->status == "Y") {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Main slider record ' . $data->title_en . ' deactivated(' . $id . ').');

            return redirect()->route('main-slider-list')
                ->with('success', 'Main slider deactivate successfully.');
        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Main slider record ' . $data->title_en . ' activated(' . $id . ').');

            return redirect()->route('main-slider-list')
                ->with('success', 'Main slider activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  MainSlider::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Main slider record ' . $data->title_en . ' deleted(' . $id . ').');

        return redirect()->route('main-slider-list')
            ->with('success', 'Main slider deleted successfully.');
    }
}
