<?php

namespace App\Http\Controllers\Adminpanel\Stay;

use App\Http\Controllers\Controller;
use App\Models\StayFeatures;
use Illuminate\Http\Request;
use DataTables;

class FeaturesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:room-feature-list|room-feature-create|room-feature-edit|room-feature-delete', ['only' => ['list']]);
        $this->middleware('permission:room-feature-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:room-feature-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:room-feature-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.stay.features.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required|in:Y,N'
        ]);

        if (!$request->file('icon') == "") {

            $icon = $request->file('icon')->getClientOriginalName();

            $pathicon = $request->file('icon')->store('public/room_features_images');
        } else {
            $path = "";
        }
        
        $feature = new StayFeatures();
        $feature->title = $request->title;
        $feature->icon = $pathicon;
        $feature->order = $request->order;
        $feature->status = $request->status;
        $feature->save();
        $id = $feature->id;

        \LogActivity::addToLog('New Room Feature '.$request->title.' added('.$id.').');

        return redirect()->route('room-feature-list')
            ->with('success', 'Stay Feature created successfully.');
    }

     public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = StayFeatures::where('is_delete', 0)->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('room_features_images', function ($row) {
                    $imgpath = "storage/app/$row->icon";
                    $img = '<img src="'.$imgpath.'">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-room-feature/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-room-feature/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockfeature', 'adminpanel.stay.features.actionsBlock')
                ->rawColumns(['room_features_images','edit', 'activation','blockfeature'])
                ->make(true);
        }

        return view('adminpanel.stay.features.list');
    }

    public function edit($id)
    {
        $featuresID = decrypt($id);
        $data = StayFeatures::find($featuresID);

        return view('adminpanel.stay.features.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'status' => 'required|in:Y,N'
        ]);

        if ($request->hasFile('icon')) {

            $icon = $request->file('icon')->getClientOriginalName();

            $pathicon = $request->file('icon')->store('public/room_features_images');

        }

        
        $data =  StayFeatures::find($request->id);
        $data->title = $request->title;
        if(!empty($pathicon)) {
            $data->icon = $pathicon;
        }
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Room Feature record '.$data->title.' updated('.$id.').');

        return redirect()->route('room-feature-list')
            ->with('success', 'Room Feature updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  StayFeatures::find($request->id);

        if ( $data->status == "Y" ) {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Room Feature record '.$data->title.' deactivated('.$id.').');

            return redirect()->route('room-feature-list')
            ->with('success', 'Room Feature deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Room Feature record '.$data->title.' activated('.$id.').');

            return redirect()->route('room-feature-list')
            ->with('success', 'Room Feature activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  StayFeatures::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Room Feature record '.$data->title.' deleted('.$id.').');

        return redirect()->route('room-feature-list')
            ->with('success', 'Room Feature deleted successfully.');
    }
}