<?php

namespace App\Http\Controllers;

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
            return redirect()->back();
        }
    }

    public function index()
    {
        $doctor_info = Doctor::latest()->get();
        return view('user.home', compact('doctor_info'));
    }
}
