<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctor_info = Doctor::latest()->get();
        return view('admin.doclist', compact('doctor_info'));
    }

    public function AddDoctor()
    {
        return view('admin.addoctor');
    }

    public function StoreDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'room_no' => 'required',
            'Speciality' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'details' => 'required',
        ]);

        $img = $request->image;
        $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $img_name);


        Doctor::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'room_no' => $request->room_no,
            'Speciality' => $request->Speciality,
            'image' => $img_name,
            'details' => $request->details,

        ]);

        return redirect()->route('doclist')->with('message', 'Doctor added successfully');
    }
}
