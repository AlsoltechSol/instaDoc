<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Doctor;
use File;


class DoctorController extends Controller
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
        if (is_null($this->user) || !$this->user->can('doctor.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        $doctor= Doctor::all();

        return view('backend.pages.doctor.index',compact('doctor'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('doctor.create')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }
        
        return view('backend.pages.doctor.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('doctor.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        //dd($request);
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->specialization = $request->specialization;
        $doctor->yearsOfExperience = $request->experience;
        $doctor->education = $request->education;
        $doctor->language = $request->language;
        $doctor->fees = $request->fee;
        $doctor->doctor_registration_no = $request->registration_no;
       
        $file=$request->file('image');
        $filename='Doctor-'.time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('images/DoctorImage');
        $file->move($destinationPath,$filename);
        $doctor->image=$filename;

        $doctor->save();

        session()->flash('success', 'Doctor Profile has been created !!');
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('doctor.show')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $details = Doctor::findOrFail($id);
   
        return view('backend.pages.doctor.show',compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('doctor.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $doctor = Doctor::find($id);
      
        return view('backend.pages.doctor.edit',compact('doctor')); 
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
        if (is_null($this->user) || !$this->user->can('doctor.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $doctor=Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->specialization = $request->specialization;
        $doctor->yearsOfExperience = $request->experience;
        $doctor->education = $request->education;
        $doctor->language = $request->language;
        $doctor->fees = $request->fee;
        $doctor->doctor_registration_no = $request->registration_no;
       
        if($request->hasFile('image')){
            if($doctor->image){
                $old_path= public_path('images/DoctorImage/'.$doctor->image);
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }

        }
        $file=$request->file('image');
        if(isset($file)){

        $filename='Doctor-'.time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('images/DoctorImage');
        $file->move($destinationPath,$filename);
        $doctor->image=$filename;
        }
        $doctor->save();

        session()->flash('success', 'Doctor Profile has been created !!');
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
