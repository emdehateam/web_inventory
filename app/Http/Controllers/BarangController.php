<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data_barang = BarangModel::all();
        $data = ([
            'barang' => $data_barang

        ]);
        return view('dashboard/barang/index')->with($data);
    }
}
