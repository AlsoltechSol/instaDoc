<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LabCenter;
use Illuminate\Http\Request;

class LabCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab_centers = LabCenter::orderBy('created_at', 'desc')->get();
        return view('backend.pages.lab_center.index', compact('lab_centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.lab_center.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'location' => 'required'
        // ]);

        $data = $request->all();

        LabCenter::create($data);

        return redirect()->route('admin.lab_centers.index')->with('message', 'LabCenter added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabCenter  $labCenter
     * @return \Illuminate\Http\Response
     */
    public function show(LabCenter $labCenter)
    {
        return view('backend.pages.lab_center.show', compact('labCenter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabCenter  $labCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(LabCenter $labCenter)
    {
        return view('backend.pages.lab_center.edit', compact('labCenter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabCenter  $labCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabCenter $labCenter)
    {
        // $request->validate([
        //     'location' => 'required'
        // ]);

        $data = $request->all();

        $labCenter->fill($data);
        $labCenter->save();

        return redirect()->route('admin.lab_centers.index')->with('message', 'LabCenter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabCenter  $labCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabCenter $labCenter)
    {
        if ($labCenter){
            $labCenter->delete();
            return back()->with('message', 'LabCenter deleted successfully');
        }
    }
}
