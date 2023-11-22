<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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

    public function SubmitMail(Request $request, $id)
    {
        $data = Appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part,
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Mail send successfully');
    }
}
