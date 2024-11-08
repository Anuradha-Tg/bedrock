<?php

namespace App\Http\Controllers\Adminpanel\Stay;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use DataTables;

class PromotionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:promotion-list|promotion-create|promotion-edit|promotion-delete', ['only' => ['list']]);
        $this->middleware('permission:promotion-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:promotion-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:promotion-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.stay.promotion.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'home_image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'date_from' => 'required',
            'date_to' => 'required',
            'status' => 'required|in:Y,N'
        ]);

        if (!$request->file('image') == "") {

            $image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/promotion_images');
        } else {
            $path = "";
        }


        $pathhome_image1 = $request->file('home_image1') ? $request->file('home_image1')->store('public/promotion_images') : null;




        $promotion = new Promotion();
        $promotion->heading = $request->heading;
        $promotion->description = $request->description;
        $promotion->image = $pathimage;
        $promotion->home_image1 = $pathhome_image1;
        $promotion->home_title = $request->home_title;
        $promotion->home_content = $request->home_content;
        $promotion->checkbox = $request->checkbox ?? 0;
        $promotion->date_from = $request->date_from;
        $promotion->date_to = $request->date_to;
        $promotion->status = $request->status;
        $promotion->save();
        $id = $promotion->id;

        \LogActivity::addToLog('Promotion '.$request->heading.' added('.$id.').');

        return redirect()->route('promotion-list')
            ->with('success', 'Promotion created successfully.');
    }

     public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Promotion::where('is_delete', 0)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-promotion/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-promotion/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockpromotion', 'adminpanel.stay.promotion.actionsBlock')
                ->rawColumns(['edit', 'activation','blockpromotion'])
                ->make(true);
        }

        return view('adminpanel.stay.promotion.list');
    }

    public function edit($id)
    {
        $promotionID = decrypt($id);
        $data = Promotion::find($promotionID);

        return view('adminpanel.stay.promotion.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
             'heading' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'home_image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/promotion_images');

        }

        if (!$request->hasFile('home_image1') == "") {

            $home_image1 = $request->file('home_image1')->getClientOriginalName();

            $pathhome_image1 = $request->file('home_image1')->store('public/promotion_images');
        }

        $data =  Promotion::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        if(!empty($pathimage)) {
            $data->image = $pathimage;
        }

        if(!empty($pathhome_image1)) {
            $data->home_image1 = $pathhome_image1;
        }

        $data->home_title = $request->home_title;
        $data->home_content = $request->home_content;
        $data->checkbox = $request->has('checkbox') ? 1 : 0;
        $data->date_from = $request->date_from;
        $data->date_to = $request->date_to;
        $data->status = $request->status;
        $data->save();
        $id = $data->id;
// dd($data);
        \LogActivity::addToLog('Promotion record '.$data->heading.' updated('.$id.').');

        return redirect()->route('promotion-list')
            ->with('success', 'Promotion updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
        ]);

        $data =  Promotion::find($request->id);

        if ( $data->status == "Y" ) {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Promotion record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('promotion-list')
            ->with('success', 'Promotion deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Promotion record '.$data->heading.' activated('.$id.').');

            return redirect()->route('promotion-list')
            ->with('success', 'Promotion activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  Promotion::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Promotion record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('promotion-list')
            ->with('success', 'Promotion deleted successfully.');
    }
}
