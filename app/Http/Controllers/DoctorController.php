<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class DoctorController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $doctor_info = Doctor::latest()->get();
            return view('admin.doclist', compact('doctor_info'));
        } else {
            return redirect('/');
        }
    }

    public function AddDoctor()
    {
        if (Auth::id()) {
            return view('admin.addoctor');
        } else {
            return redirect('/');
        }
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

    public function EditDoctor($id)
    {
        if (Auth::id()) {
            $doctor_info = Doctor::findOrFail($id);

            return view('admin.editdoctor', compact('doctor_info'));
        } else {
            return redirect('/');
        }
    }

    public function UpdateDoctor(Request $request)
    {
        $doctor_id = $request->id;

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'room_no' => 'required',
            'Speciality' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'details' => 'required',
        ]);

        $data = Doctor::find($doctor_id);

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->room_no = $request->room_no;
        $data->Speciality = $request->Speciality;
        $data->details = $request->details;
        $img = $request->image;

        if ($img) {
            $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $img_name);

            $data->image = $img_name;
        }

        $data->save();

        return redirect()->route('doclist')->with('message', 'Doctor update successfully');
    }

    public function DeleteDoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back();
    }
}
