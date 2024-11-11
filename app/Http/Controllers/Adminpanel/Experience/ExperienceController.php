<?php

namespace App\Http\Controllers\Adminpanel\Experience;

use App\Http\Controllers\Controller;
use App\Models\ExperienceList;
use Illuminate\Http\Request;
use DataTables;

class ExperienceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:experience-list|experience-create|experience-edit|experience-delete', ['only' => ['list']]);
        $this->middleware('permission:experience-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:experience-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:experience-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.experience.list.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required|max:1000',
            'image1' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'home_image1' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'status' => 'required|in:Y,N'
        ]);

        if (!$request->file('image1') == "") {

            $image1 = $request->file('image1')->getClientOriginalName();

            $pathimage1 = $request->file('image1')->store('public/experience_images');
        } else {
            $path = "";
        }




        $pathhome_image1 = $request->file('home_image1') ? $request->file('home_image1')->store('public/experience_images') : null;




        $experience = new ExperienceList();
        $experience->heading = $request->heading;
        $experience->description = $request->description;
        $experience->image1 = $pathimage1;
        $experience->home_image1 = $pathhome_image1;
        $experience->home_title = $request->home_title;
        $experience->home_content = $request->home_content;
        $experience->checkbox = $request->checkbox ?? 0;
        $experience->order = $request->order;
        $experience->status = $request->status;
        $experience->save();
        $id = $experience->id;

        \LogActivity::addToLog('Experience '.$request->heading.' added('.$id.').');

        return redirect()->route('experience-list')
            ->with('success', 'Experience created successfully.');
    }

     public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ExperienceList::where('is_delete', 0)->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('experience_images', function ($row) {
                    $imgpath = "storage/app/$row->icon";
                    $img = '<img src="'.$imgpath.'">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-experience/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-experience/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockexperience', 'adminpanel.experience.list.actionsBlock')
                ->rawColumns(['edit', 'activation','blockexperience'])
                ->make(true);
        }

        return view('adminpanel.experience.list.list');
    }

    public function edit($id)
    {
        $experienceID = decrypt($id);
        $data = ExperienceList::find($experienceID);

        return view('adminpanel.experience.list.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required|max:1000',
            'image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'home_image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',




            // 'status' => 'required|in:Y,N'
        ]);

        if ($request->hasFile('image1')) {

            $image1 = $request->file('image1')->getClientOriginalName();

            $pathimage1 = $request->file('image1')->store('public/experience_images');

        }


        if (!$request->hasFile('home_image1') == "") {

            $home_image1 = $request->file('home_image1')->getClientOriginalName();

            $pathhome_image1 = $request->file('home_image1')->store('public/experience_images');
        }




        $data =  ExperienceList::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        if(!empty($pathimage1)) {
            $data->image1 = $pathimage1;
        }
        
        if(!empty($pathhome_image1)) {
            $data->home_image1 = $pathhome_image1;
        }

        $data->home_title = $request->home_title;
        $data->home_content = $request->home_content;
        $data->checkbox = $request->has('checkbox') ? 1 : 0;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Experience record '.$data->heading.' updated('.$id.').');

        return redirect()->route('experience-list')
            ->with('success', 'Experience updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  ExperienceList::find($request->id);

        if ( $data->status == "Y" ) {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Experience record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('experience-list')
            ->with('success', 'Experience deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Experience record '.$data->heading.' activated('.$id.').');

            return redirect()->route('experience-list')
            ->with('success', 'Experience activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  ExperienceList::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Experience record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('experience-list')
            ->with('success', 'Experience deleted successfully.');
    }
}
