<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function ShowAppointment()
    {
        if (Auth::id()) {
            $all_appointment = Appointment::latest()->get();
            return view('admin.show_appointment', compact('all_appointment'));
        } else {
            return redirect('/');
        }
    }

    public function approveAppointment($id)
    {
        $data = Appointment::find($id);

        $data->status = "Approved";

        $data->save();

        return redirect()->back();
    }

    public function CancleAppointment($id)
    {
        $data = Appointment::find($id);

        $data->status = "Cancle";

        $data->save();

        return redirect()->back();
    }

    public function SendUserMail($id)
    {
        $appointment_info = Appointment::find($id);
        return view('admin.send_user_mail', compact('appointment_info'));
    }
}
