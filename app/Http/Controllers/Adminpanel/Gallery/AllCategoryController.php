<?php

namespace App\Http\Controllers\Adminpanel\Gallery;

use App\Http\Controllers\Controller;
use App\Models\AllCategory;
use Illuminate\Http\Request;
use DataTables;

class AllCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:all-category-list|all-category-create|all-category-edit|all-category-delete', ['only' => ['list']]);
        $this->middleware('permission:all-category-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:all-category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:all-category-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.gallery.all_category.index');
    }

    public function store(Request $request)
    {

        $currentImageCount = AllCategory::count();
        $maxImages = 12;

        // Check if the limit has been reached
        if ($currentImageCount >= $maxImages) {
            return redirect()->route('all-category-list')
                ->with('error', 'You can only upload up to 12 images.');
        }

        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'order' => 'required'
        ]);

        if (!$request->file('image') == "") {

            $image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/all_images');
        } else {
            $path = "";
        }



        $allCategory = new AllCategory();
        $allCategory->image = $pathimage;
        $allCategory->checkbox = $request->checkbox ?? 0;
        $allCategory->order = $request->order;
        $allCategory->save();


        return redirect()->route('all-category-list')
            ->with('success', 'All Category created successfully.');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = AllCategory::get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('all_images', function ($row) {
                    $imgpath = "storage/app/$row->image";
                    $img = '<img src="' . $imgpath . '">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-all-category/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('checkbox', function ($row) {
                    $checked = $row->checkbox ? 'checked' : '';

                    $toggle = '
                        <div class="smart-form">
                            <label class="toggle">
                                <input type="checkbox" class="toggle-checkbox" data-id="' . $row->id . '" ' . $checked . '>
                                <i data-swchon-text="ON" data-swchoff-text="OFF" style="margin-right: 10px; margin-top: -4px; position: relative;"></i>
                            </label>
                        </div>';

                    return $toggle;
                })

                ->addColumn('activation', function ($row) {
                    if ($row->status == "Y")
                        $status = 'fa fa-check';
                    else
                        $status = 'fa fa-remove';

                    $btn = '<a href="changestatus-all-category/' . $row->id . '/' . $row->cEnable . '"><i class="' . $status . '"></i></a>';

                    return $btn;
                })
                ->addColumn('blockcategory', 'adminpanel.gallery.all_category.actionsBlock')
                ->rawColumns(['checkbox', 'all_images', 'edit', 'activation', 'blockcategory'])
                ->make(true);
        }

        return view('adminpanel.gallery.all_category.list');
    }


    public function updateCheckboxStatus(Request $request)
    {
        $category = AllCategory::find($request->id);
        // Count the number of records with the checkbox enabled
        $checkedCount = AllCategory::where('checkbox', 1)->count();

        // If trying to enable a new checkbox and the limit has been reached
        if ($category->checkbox == "0" && $checkedCount >= 8) {
            return redirect()->route('all-category-list')
                ->with('error', 'Only 8 records can be activated at the same time.');
        } else {
            if ($category->checkbox == "1") {
                $category->checkbox = '0';
                $category->save();


                return redirect()->route('all-category-list')
                    ->with('success', 'Deactivated successfully. The Image will not be shown in home page');
            } else {

                $category->checkbox = "1";
                $category->save();




                return redirect()->route('all-category-list')
                    ->with('success', 'Activated successfully.  The Image will be shown in home page');
            }
        }
    }






    public function block(Request $request)
    {


        $data =  AllCategory::find($request->id);

        $data->delete(); // Delete the record from the database


        return redirect()->route('all-category-list')
            ->with('success', 'All Category deleted successfully');
    }
}
