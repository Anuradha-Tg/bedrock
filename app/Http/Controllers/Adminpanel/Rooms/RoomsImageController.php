<?php

namespace App\Http\Controllers\Adminpanel\Rooms;

use App\Http\Controllers\Controller;
use App\Models\RoomImages;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class RoomsImageController extends Controller

{
    function __construct()
    {
        $this->middleware('permission:room-images-list|room-images-create|room-images-edit|room-images-delete', ['only' => ['index', 'list']]);
        $this->middleware('permission:room-images-create', ['only' => ['store', 'create']]);
        $this->middleware('permission:room-images-delete', ['only' => ['block', 'destroy']]);

    }

    public function index()
{
    $rooms = Rooms::where('is_delete', false)->get(); // Fetch all categories that are not deleted
    return view('adminpanel.room.roomImages.index', compact('rooms'));
}

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'images.*.image_name' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'images.*.order' => 'required|integer',
        ]);

        foreach ($request->images as $imageData) {
            $image = new RoomImages();
            $image->room_id = $request->room_id;
            $image->order = $imageData['order'];

            if (isset($imageData['image_name'])) {
                $image->image_name = $imageData['image_name']->store('public/room_images');
            }

            $image->save();
        }

        return redirect()->route('room-images-list')
            ->with('success', 'Images created successfully.');
    }


        public function list(Request $request)
    {

        if ($request->ajax()) {
            $data = RoomImages::with('room')->get(); // Fetch the images with their associated category

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return $row->room->title ?? 'N/A'; // Display the category name, or 'N/A' if not found
                })
                ->addColumn('image_name', function ($row) {
                    $imgPath = asset("storage/app/{$row->image_name}");
                    $img = '<img src="' . $imgPath . '" style="width: 100px; height: auto;">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-images/' . encrypt($row->id));
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('blockimages', 'adminpanel.gallery.images.actionBlock')
                ->rawColumns(['title', 'image_name', 'edit', 'blockimages'])
                ->make(true);
        }

        return view('adminpanel.room.roomImages.list');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'images.*.image_name' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'images.*.order' => 'required|integer',
        ]);

        $image = Image::find($id);
        $image->room_id = $request->room_id;
        $image->order = $request->order;

        if ($request->hasFile('images')) {
            $image->image_name = $request->file('images')[0]['image_name']->store('public/room_images');
        }

        $image->save();

        return redirect()->route('room-images-list')
            ->with('success', 'Image updated successfully.');
    }

    public function block(Request $request)
    {


        $image = RoomImages::find($request->id);

        Storage::delete($image->image_name); // Delete the image file from storage
        $image->delete(); // Delete the record from the database


        return redirect()->route('room-images-list')
        ->with('success', 'Images deleted successfully');
    }




}

