<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\TopBanner;
use Illuminate\Http\Request;
use DataTables;

class TopBannerController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:top-banner-list|top-banner-edit', ['only' => ['list']]);
        $this->middleware('permission:top-banner-edit', ['only' => ['edit, update']]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = TopBanner::orderBy('order', 'ASC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('banner_image', function ($row) {
                    $imgpath = "storage/app/$row->banner_image";
                    $img = '<img src="'.$imgpath.'">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-top-banner/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                // ->addColumn('activation', function($row){
                //     if ( $row->status == "Y" )
                //         $status ='fa fa-check';
                //     else
                //         $status ='fa fa-remove';

                //     $btn = '<a href="changestatus-top-banner/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                //     return $btn;
                // })
                // ->addColumn('adminpanel.topbanner.actionsBlock')
                ->rawColumns(['banner_image','edit'])
                ->make(true);
        }

        return view('adminpanel.topbanner.list');
    }

    public function edit($id)
    {
        $topBannerId = decrypt($id);
        $data = TopBanner::find($topBannerId);

        return view('adminpanel.topbanner.edit', ['data' => $data]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'page_name' => 'required',

        ]);

        if (!$request->file('banner_image') == "") {

            $request->validate([
                'banner_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image = $request->file('banner_image')->getClientOriginalName();

            $bannerimage = $request->file('banner_image')->store('public/topbanners');
        } else {
            $bannerimage = "";
        }

        $data =  TopBanner::find($request->id);
        $data->page_name = $request->page_name;
        $data->heading = $request->heading;

        if(!empty($bannerimage)) {
            $data->banner_image = $bannerimage;
        }
        $data->save();

        \LogActivity::addToLog('Top banner record updated.');

        return redirect()->route('top-banner-list')
            ->with('success', 'Top banner updated successfully.');
    }

}
