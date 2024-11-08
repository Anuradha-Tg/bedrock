<?php

namespace App\Http\Controllers\Adminpanel\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory as Category;
use App\Models\GalleryImages as Image;
use App\Models\GalleryVideos as Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class GalleryCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallery-list|gallery-create|gallery-edit|gallery-delete', ['only' => ['index', 'list']]);
        $this->middleware('permission:gallery-create', ['only' => ['store', 'create']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['block', 'destroy']]);
    }

    public function index()
    {
        return view('adminpanel.gallery.gallery_category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;




        $category->save();

        // Handle images
        // if ($request->has('images')) {
        //     foreach ($request->images as $image) {
        //         $imageModel = new Image();
        //         $imageModel->category_id = $category->id;
        //         $imageModel->image_name = $image['image_name']->store('public/images');
        //         $imageModel->order = $image['order'] ?? 0;
        //         $imageModel->save();
        //     }
        // }

        // if ($request->has('videos')) {
        //     foreach ($request->videos as $video) {
        //         $videoModel = new Video();
        //         $videoModel->category_id = $category->id;
        //         $videoModel->video_name = $video['video_name']->store('public/videos');
        //         $videoModel->order = $video['order'] ?? 0;
        //         $videoModel->save();
        //     }
        // }


        return redirect()->route('gallery-list')
            ->with('success', 'Gallery category created successfully.');
    }



    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::where('is_delete', 0)->get();
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-gallery/' . encrypt($row->id));
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ($row->status == "Y") {
                        $status ='fa fa-check';
                    } else {
                        $status ='fa fa-remove';
                    }

                    $btn = '<a href="'.route('changestatus-gallery', ['id' => $row->id]).'"><i class="'.$status.'"></i></a>';
                    return $btn;
                })
                ->addColumn('blockgallery', 'adminpanel.gallery.gallery_category.actionsBlock')
                ->rawColumns([ 'edit', 'activation', 'blockgallery'])
                ->make(true);
        }

        return view('adminpanel.gallery.gallery_category.list');
    }


    public function edit($id)
    {
        $categoryID = decrypt($id);
        $data = Category::find($categoryID);
        // $images = Image::where('category_id', $categoryID)->get();
        // $videos = Video::where('category_id', $categoryID)->get();

        return view('adminpanel.gallery.gallery_category.edit', ['data' => $data ]);
        // 'images' => $images, 'videos' => $videos]);
    }



    public function update(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        // Find the category first
        $data = Category::find($request->id);
        if (!$data) {
            return redirect()->route('gallery-list')->with('error', 'Category not found.');
        }

        // Handle thumbnail update
       
        // // Handle image deletions
        // if ($request->has('delete_images')) {
        //     foreach ($request->delete_images as $imageId) {
        //         $image = Image::find($imageId);
        //         if ($image) {
        //             Storage::delete($image->image_name); // Delete the image file from storage
        //             $image->delete(); // Delete the record from the database
        //         }
        //     }
        // }

        // // Handle Video deletions
        // if ($request->has('delete_videos')) {
        //     foreach ($request->delete_videos as $videoId) {
        //         $video = Video::find($videoId);
        //         if ($video) {
        //             Storage::delete($video->video_name); // Delete the video file from storage
        //             $video->delete(); // Delete the record from the database
        //         }
        //     }
        // }


        // // Handle image updates/additions
        // if ($request->has('images')) {
        //     foreach ($request->images as $image) {
        //         if (isset($image['image_name']) && $image['image_name']) { // Check if image_name exists
        //             $imagePath = $image['image_name']->store('public/images');
        //             Image::updateOrCreate(
        //                 ['id' => $image['id'] ?? null],
        //                 [
        //                     'category_id' => $data->id,
        //                     'image_name' => $imagePath,
        //                     'order' => $image['order'] ?? 0
        //                 ]
        //             );
        //         }
        //     }
        // }

        // // Handle video updates/additions
        // if ($request->has('videos')) {
        //     foreach ($request->videos as $video) {
        //         if (isset($video['video_name']) && $video['video_name']) {
        //             $videoPath = $video['video_name']->store('public/video');
        //             Video::updateOrCreate(
        //                 ['id' => $video['id'] ?? null],
        //                 [
        //                     'category_id' => $data->id,
        //                     'video_name' => $videoPath,
        //                     'order' => $video['order'] ?? 0
        //                 ]
        //             );
        //         }
        //     }
        // }


        // Update category data
        $data->category_name = $request->category_name;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Gallery record ' . $data->category_name . ' updated(' . $data->id . ').');

        return redirect()->route('gallery-list')
            ->with('success', 'Gallery Category updated successfully.');
    }



    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  Category::find($request->id);

        if ( $data->status == "Y" ) {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Gallery record '.$data->category_name.' deactivated('.$id.').');

            return redirect()->route('gallery-list')
            ->with('success', 'Gallery Category deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Gallery record '.$data->category_name.' activated('.$id.').');

            return redirect()->route('gallery-list')
            ->with('success', 'Gallery Category activate successfully.');
        }
    }





    public function block(Request $request)
    {
        $data = Category::find($request->id);

        if (!$data) {
            return redirect()->route('gallery-list')->with('error', 'Gallery not found.');
        }

        // Retrieve and delete all associated images
        $images = Image::where('category_id', $data->id)->get();
        foreach ($images as $image) {
            Storage::delete($image->image_name); // Delete the image file from storage
            $image->delete(); // Delete the record from the database
        }

        // Retrieve and delete all associated videos
        $videos = Video::where('category_id', $data->id)->get();
        foreach ($videos as $video) {
            Storage::delete($video->video_name); // Delete the image file from storage
            $video->delete(); // Delete the record from the database
        }

        // Mark the category as deleted
        $data->is_delete = 1;
        $data->save();

        \LogActivity::addToLog('Gallery record ' . $data->category_name . ' and its images deleted(' . $data->id . ').');

        return redirect()->route('gallery-list')
            ->with('success', 'Gallery Category deleted successfully.');
    }
}
