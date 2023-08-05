<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPegawaiController extends Controller
{
    public function index()
    {
        $data= [
            'judul' => 'Pegawai'
        ];
        return view('pegawai/index', $data);
    }
}
