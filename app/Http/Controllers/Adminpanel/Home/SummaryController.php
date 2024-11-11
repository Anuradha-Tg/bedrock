<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\Summary;
use Illuminate\Http\Request;
use DataTables;

class SummaryController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:summary-edit', ['only' => ['index, update']]);
    }

    public function index()
{
    $data = Summary::first();

    if (!$data) {
        $data = Summary::create([
            'title' => '',
            'description' => '',
        ]);
    }

    return view('adminpanel.home.summary.index', compact('data'));
}

    public function update(Request $request)
    {
        // dd($request->description);
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $data =  Summary::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        \LogActivity::addToLog('Summary record updated.');

        return redirect()->route('summary-edit')
            ->with('success', 'Summary updated successfully.');
    }

}
