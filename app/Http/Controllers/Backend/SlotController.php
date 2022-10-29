<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SlotController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slot=Slot::all();
        return view('backend.pages.slot.index',compact('slot'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.slot.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $slot = new Slot();
        $slot->date = $request->date;
        $slot->weekday = $request->weekday;
        $slot->start_time = $request->start_time;
        $slot->end_time = $request->end_time;
       
        $slot->save();


        session()->flash('success', 'Slot  has been created !!');
        return redirect()->route('admin.slot.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slot = Slot::find($id);
      
        return view('backend.pages.slot.edit',compact('slot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slot=Slot::find($id);
        $slot->date = $request->date;
        $slot->weekday = $request->weekday;
        $slot->start_time = $request->start_time;
        $slot->end_time = $request->end_time;
       
        $slot->save();
        session()->flash('success', 'Slot  has been updated !!');
        return redirect()->route('admin.slot.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slot = Slot::find($id);
        if(!is_null($slot)){
            $slot->delete();
        }
        return back();
    }
}
