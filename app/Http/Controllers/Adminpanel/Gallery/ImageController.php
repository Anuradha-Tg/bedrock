<?php

namespace App\Http\Controllers\Adminpanel\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory as Category;
use App\Models\GalleryImages as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class ImageController extends Controller

{
    function __construct()
    {
        $this->middleware('permission:images-list|images-create|images-edit|images-delete', ['only' => ['index', 'list']]);
        $this->middleware('permission:images-create', ['only' => ['store', 'create']]);
        $this->middleware('permission:images-delete', ['only' => ['block', 'destroy']]);

    }

    public function index()
{
    $categories = Category::where('is_delete', false)->get(); // Fetch all categories that are not deleted
    return view('adminpanel.gallery.images.index', compact('categories'));
}

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'images.*.image_name' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'images.*.image_order' => 'required|integer',
        ]);

        foreach ($request->images as $imageData) {
            $image = new Image();
            $image->category_id = $request->category_id;
            $image->image_order = $imageData['image_order'];

            if (isset($imageData['image_name'])) {
                $image->image_name = $imageData['image_name']->store('public/images');
            }

            $image->save();
        }

        return redirect()->route('images-list')
            ->with('success', 'Images created successfully.');
    }


        public function list(Request $request)
    {

        if ($request->ajax()) {
            $data = Image::with('category')->get(); // Fetch the images with their associated category

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->category->category_name ?? 'N/A'; // Display the category name, or 'N/A' if not found
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
                ->rawColumns(['category_name', 'image_name', 'edit', 'blockimages'])
                ->make(true);
        }

        return view('adminpanel.gallery.images.list');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:gallery_categories,id',
            'images.*.image_name' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'images.*.image_order' => 'required|integer',
        ]);

        $image = Image::find($id);
        $image->category_id = $request->category_id;
        $image->image_order = $request->image_order;

        if ($request->hasFile('images')) {
            $image->image_name = $request->file('images')[0]['image_name']->store('public/images');
        }

        $image->save();

        return redirect()->route('images-list')
            ->with('success', 'Image updated successfully.');
    }

    public function block(Request $request)
    {


        $image = Image::find($request->id);

        Storage::delete($image->image_name); // Delete the image file from storage
        $image->delete(); // Delete the record from the database


        return redirect()->route('images-list')
        ->with('success', 'Images deleted successfully');
    }




}

