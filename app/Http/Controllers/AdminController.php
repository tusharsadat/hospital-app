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
}
