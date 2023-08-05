<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $data= [
            'judul' => 'Admin'
        ];
        return view('dashboard/index', $data);
    }
}
