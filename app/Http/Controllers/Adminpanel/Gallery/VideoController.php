<?php

namespace App\Http\Controllers\Adminpanel\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory as Category;
use App\Models\GalleryVideos as Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class VideoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:video-list|video-create|video-edit|video-delete', ['only' => ['index', 'list']]);
        $this->middleware('permission:video-create', ['only' => ['store', 'create']]);
        $this->middleware('permission:video-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:video-delete', ['only' => ['block', 'destroy']]);
    }

    public function index()
    {
        $categories = Category::where('is_delete', false)->get(); // Fetch all categories that are not deleted
        return view('adminpanel.gallery.videos.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'videos.*.video' => 'nullable|mimes:mp4,mkv,avi,flv|max:20480',
            'videos.*.order' => 'required|integer',
        ]);

        foreach ($request->videos as $videoData) {
            $video = new Video();
            $video->category_id = $request->category_id;
            $video->video_name = $request->video_name;
            $video->order = $videoData['order'];

            if (isset($videoData['video'])) {
                // Store the video file and save the path in the video column
                $video->video = $videoData['video']->store('public/videos'); 
            }
    

            $video->save();
        }

        return redirect()->route('video-list')
            ->with('success', 'Videos created successfully.');
    }

//     public function store(Request $request)
// {
//     $request->validate([
//         'category_id' => 'required|exists:categories,id',
//         'videos.*.video' => 'nullable|mimes:mp4,mkv,avi,flv|max:20480',
//         'videos.*.order' => 'required|integer',
//     ]);

//     foreach ($request->videos as $videoData) {
//         $video = new Video();
//         $video->category_id = $request->category_id;
//         $video->order = $videoData['order'];

//         if (isset($videoData['video'])) {
//             // Store the video file and save the path in the video column
//             $video->video = $videoData['video']->store('public/videos'); 
//         }

//         $video->save();
//     }

//     return redirect()->route('videos-list')
//         ->with('success', 'Videos created successfully.');
// }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Video::with('category')->get(); // Fetch the videos with their associated category

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->category->category_name ?? 'N/A'; // Display the category name, or 'N/A' if not found
                })
                
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-videos/' . encrypt($row->id));
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('blockvideo', 'adminpanel.gallery.videos.actionBlock')
                ->rawColumns(['category_name', 'edit', 'blockvideo'])
                ->make(true);
        }

        return view('adminpanel.gallery.videos.list');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        $categories = Category::where('is_delete', false)->get();
        return view('adminpanel.gallery.videos.edit', compact('video', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'videos.*.video_name' => 'required',
            'videos.*.video' => 'nullable|mimes:mp4,mkv,avi,flv|max:20480',
            'videos.*.order' => 'required|integer',
        ]);

        $video = Video::find($id);
        $video->category_id = $request->category_id;
        $video->order = $request->order;

        if ($request->hasFile('videos')) {
            $video->video_name = $request->file('videos')[0]['video_name']->store('public/videos');
        }

        $video->save();

        return redirect()->route('video-list')
            ->with('success', 'Video updated successfully.');
    }

    public function block(Request $request)
    {

            $video = Video::find($request->id);
    
            Storage::delete($video->video); // Delete the image file from storage
            $video->delete(); // Delete the record from the database
            
    
            return redirect()->route('video-list')
            ->with('success', 'Video deleted successfully');
    }
}
