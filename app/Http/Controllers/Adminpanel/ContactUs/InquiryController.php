<?php

namespace App\Http\Controllers\Adminpanel\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use DataTables;

class InquiryController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:inquiry-list', ['only' => ['list, view']]);

    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Inquiry::get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('view', function ($row) {
                    $view_url = url('inquiry-view/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $view_url . '"><i class="fa fa-file-text"></i></a>';
                    return $btn;
                })
                ->rawColumns(['view'])
                ->make(true);
        }

        return view('adminpanel.contactusdetails.inquiry.index');
    }


    public function view($id)
    {
        $ID = decrypt($id);
        $data = Inquiry::find($ID);

        return view('adminpanel.contactusdetails.inquiry.view', ['data' => $data]);
    }

}
