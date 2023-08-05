<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data= [
            'judul' => 'Administrator',
            'a' => 2,
            'b' => 5
        ];
        return view('dashboard/index')->with($data);
    }
}
