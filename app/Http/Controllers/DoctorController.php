<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function AddDoctor()
    {
        return view('admin.addoctor');
    }

    public function DocList()
    {
        return view('admin.doclist');
    }
}
