<?php

namespace App\Http\Controllers\Adminpanel\Rooms;

use App\Http\Controllers\Controller;
use App\Models\MetaTag;
use App\Models\Rooms;
use App\Models\RoomFeature;
use App\Models\RoomFacility;
use App\Models\RoomFeatureData;
use App\Models\RoomFacilityData;
use Illuminate\Http\Request;
use DataTables;

class RoomsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:room-list|room-create|room-edit|room-delete', ['only' => ['list']]);
        $this->middleware('permission:room-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:room-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:room-delete', ['only' => ['block']]);
    }


    public function index()
    {
        $features = RoomFeature::all();
        $facilities = RoomFacility::all();


        return view('adminpanel.room.index', compact('features', 'facilities'));
    }

    private function generateMetaTitle($title)
    {
        // Remove special characters and replace spaces with dashes
        return preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $title));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'description1' => 'required|string',
            'description2' => 'required|string',
            'room_size' => 'required|string',
            'rooms_bed' => 'required|string',
            'occupancy' => 'required|string',
            'status' => 'required|in:Y,N',
            'home_image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);


        // $room->save();



        $pathhome_image1 = $request->file('home_image1') ? $request->file('home_image1')->store('public/rooms_images') : null;

        if (!$request->file('og_image') == "") {

            $og_image = $request->file('og_image')->getClientOriginalName();

            $pathog_image = $request->file('og_image')->store('public/og_image');
        } else {
            $path = "";
        }

        $room = new Rooms();
        $room->title = $request->title;
        $room->subtitle = $request->subtitle;
        $room->description1 = $request->description1;
        $room->description2 = $request->description2;
        $room->room_size = $request->room_size;
        $room->rooms_bed = $request->rooms_bed;
        $room->occupancy = $request->occupancy;
        $room->home_image1 = $pathhome_image1;
        $room->home_title = $request->home_title;
        $room->home_content = $request->home_content;
        $room->checkbox = $request->checkbox ?? 0;
        $room->status = $request->status;

        $room->meta_title = $this->generateMetaTitle($request->title);

        $room->save();
        $id = $room->id;

        // dd($room->meta_title);
        $metaTag = new MetaTag();
        $metaTag->page_name = 'room-details';
        $metaTag->page_title = 'Beach Bungalows Kalpitiya | Room Detail |' . $room->meta_title;
        $metaTag->room_name = $room->meta_title;
        $metaTag->description = $request->description;
        $metaTag->keywords = $request->keywords;
        $metaTag->og_title = $request->og_title;
        $metaTag->og_type = $request->og_type;
        $metaTag->og_tag = $request->og_tag;
        $metaTag->og_url = $request->og_url;
        $metaTag->og_image = $pathog_image;
        $metaTag->og_sitename = $request->og_sitename;
        $metaTag->og_description = $request->og_description;
        $metaTag->og_email = $request->og_email;
        $metaTag->order = $request->order;
        $metaTag->status = 'Y';
        $metaTag->save();



        $this->saveRoomFeatures($request, $room->id);
        $this->saveRoomFacilities($request, $room->id);

        \LogActivity::addToLog('New Room ' . $request->title . ' added(' . $id . ').');

        return redirect()->route('room-list')
            ->with('success', 'Room created successfully.');
    }

    public function saveRoomFeatures(Request $request, $roomId)
    {
        RoomFeatureData::where('room_id', $roomId)->delete();


        $features = $request->input('features', []);
        foreach ($features as $featureId => $checked) {
            if ($checked) {
                // Save each checked feature in the room_feature_data table
                $roomFeatureData = new RoomFeatureData();
                $roomFeatureData->room_id = $roomId;
                $roomFeatureData->feature_id = $featureId;
                $roomFeatureData->save();
                // dd($roomFeatureData);
            }
        }
    }


    public function saveRoomFacilities(Request $request, $roomId)
    {
        // Clear previous room facilities for the room
        RoomFacilityData::where('room_id', $roomId)->delete();

        $facilities = $request->input('facilities', []);
        foreach ($facilities as $facilityId => $checked) {
            if ($checked) {
                // Save each checked facility in the room_facility_data table
                $roomFacilityData = new RoomFacilityData();
                $roomFacilityData->room_id = $roomId;
                $roomFacilityData->facility_id = $facilityId;
                $roomFacilityData->save();
            }
        }
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Rooms::where('is_delete', 0)->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                // ->addColumn('room_images', function ($row) {
                //     $imgpath = "storage/app/$row->desktop_image";
                //     $img = '<img src="'.$imgpath.'">';
                //     return $img;
                // })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-room/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function ($row) {
                    if ($row->status == "Y")
                        $status = 'fa fa-check';
                    else
                        $status = 'fa fa-remove';

                    $btn = '<a href="changestatus-room/' . $row->id . '/' . $row->cEnable . '"><i class="' . $status . '"></i></a>';

                    return $btn;
                })
                ->addColumn('blockroom', 'adminpanel.room.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blockroom'])
                ->make(true);
        }

        return view('adminpanel.room.list');
    }

    public function edit($id)
    {
        $roomID = decrypt($id);
        $data = Rooms::find($roomID);
        $features = RoomFeature::all();
        $facilities = RoomFacility::all();
        $roomFacilities = RoomFacilityData::where('room_id', $roomID)->get();
        $roomFeatures = RoomFeatureData::where('room_id', $roomID)->get();
        $metaTag = MetaTag::where('room_name', $data->meta_title)->first();


        // dd($metaTag);

        return view('adminpanel.room.edit', compact('data', 'features', 'facilities', 'roomFacilities', 'roomFeatures', 'metaTag'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'description1' => 'required|string',
            'description2' => 'required|string',
            'room_size' => 'required|string',
            'rooms_bed' => 'required|string',
            'occupancy' => 'required|string',
            'home_image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);



        if (!$request->hasFile('home_image1') == "") {

            $home_image1 = $request->file('home_image1')->getClientOriginalName();

            $pathhome_image1 = $request->file('home_image1')->store('public/rooms_images');
        }
        if (!$request->hasFile('og_image') == "") {

            $og_image = $request->file('og_image')->getClientOriginalName();

            $pathog_image = $request->file('og_image')->store('public/og_image');
        }





        $data =  Rooms::find($request->id);
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->description1 = $request->description1;
        $data->description2 = $request->description2;
        $data->room_size = $request->room_size;
        $data->rooms_bed = $request->rooms_bed;
        $data->occupancy = $request->occupancy;

        if (!empty($pathhome_image1)) {
            $data->home_image1 = $pathhome_image1;
        }

        $data->home_title = $request->home_title;
        $data->home_content = $request->home_content;
        $data->checkbox = $request->has('checkbox') ? 1 : 0;
        $data->status = $request->status;
        $id = $data->id;

        $data->meta_title = $this->generateMetaTitle($request->title);

        $data->save();
        $this->saveRoomFeatures($request, $data->id);
        $this->saveRoomFacilities($request, $data->id);

        $metaTag = MetaTag::where('room_name', $data->meta_title)->first();
        $metaTag->page_name = 'room-details';
        $metaTag->page_title = 'Beach Bungalows Kalpitiya | Room Detail |' . $data->meta_title;
        $metaTag->room_name = $data->meta_title;
        $metaTag->description = $request->description;
        $metaTag->keywords = $request->keywords;
        $metaTag->og_title = $request->og_title;
        $metaTag->og_type = $request->og_type;
        $metaTag->og_tag = $request->og_tag;
        $metaTag->og_url = $request->og_url;
        $metaTag->og_sitename = $request->og_sitename;
        $metaTag->og_description = $request->og_description;
        $metaTag->og_email = $request->og_email;
        $metaTag->order = $request->order;
        $metaTag->status = 'Y';
        if (!empty($pathog_image)) {
            $metaTag->og_image = $pathog_image;
        }
        // dd($metaTag);
        $metaTag->save();
        // dd()







        \LogActivity::addToLog('Room record ' . $data->title . ' updated(' . $id . ').');

        return redirect()->route('room-list')
            ->with('success', 'Room updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  Rooms::find($request->id);

        if ($data->status == "Y") {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Room record ' . $data->title . ' deactivated(' . $id . ').');

            return redirect()->route('room-list')
                ->with('success', 'Room deactivate successfully.');
        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Room record ' . $data->title . ' activated(' . $id . ').');

            return redirect()->route('room-list')
                ->with('success', 'Room activate successfully.');
        }
    }



    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  Rooms::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Room record ' . $data->title . ' deleted(' . $id . ').');

        return redirect()->route('room-list')
            ->with('success', 'Room deleted successfully.');
    }
}
