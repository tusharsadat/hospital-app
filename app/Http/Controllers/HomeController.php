<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor_info = Doctor::latest()->get();
                return view('user.home', compact('doctor_info'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect('/');
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctor_info = Doctor::latest()->get();
            return view('user.home', compact('doctor_info'));
        }
    }

    public function Appointment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'doctor' => 'required',
            'date' => 'required',
        ]);

        $data = new Appointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->doctor = $request->doctor;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->status = 'In progress';
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message', 'Appointment request successful.We will contact soon');
    }

    public function Myappointment()
    {
        if (Auth::id()) {

            $user_id = Auth::user()->id;
            $user_appoint_info = Appointment::where('user_id', $user_id)->get();

            return view('user.my_appointment', compact('user_appoint_info'));
        } else {
            return redirect()->back();
        }
    }
}
