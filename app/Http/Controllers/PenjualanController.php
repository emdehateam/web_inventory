<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenjualanController extends Controller
{
    //
    public function index()
    {
        $data_penjualan = PenjualanModel::TotalHarga();
       
        $data = ([
            'penjualan' => $data_penjualan->toArray(),
            'total_barang'  => $data_penjualan->where('jumlah')->sum('jumlah'),

        ]);
        return view('dashboard/penjualan/index')->with($data);
    }

    public function tambah()
    {
        $data_barang = BarangModel::all();
        $data = ([
            'barang'    => $data_barang,
        ]);
        return view('dashboard/penjualan/tambah')->with($data);
    }

    public function proses_tambah( Request $request )
    {
        $request->validate(
            [
                'id_barang' => 'required'
            ],
            [
                'jumlah.required' => 'Email wajib di isi'
            ]
        );
        $id_brg = $request->id_barang;
        $tgl_masuk = $request->tgl_masuk;
        $jumlah_brg = $request->jumlah;
        $suplier = $request->suplier;

        $data = ([
            'id_barang'   => $id_brg,
            'tgl_masuk'     => $tgl_masuk,
            'jumlah'        => $jumlah_brg,
            'suplier'       => $suplier,
        ]);

        PenjualanModel::create($data);
        $saved = [
            'id_barang'   => $id_brg,
            'tgl_masuk'     => $tgl_masuk,
        ];

        if ($saved) {
            # kalau auth sukses maka proses disini
            return redirect('/penjualan')->with('success', 'Berhasil Tambah Data');
        }else{
            // kalau auth gagal
            return redirect('/tambah_penjualan')->withErrors('Gagal Tambah Data');
        }
    }

    public function hapus($id)
    {
        PenjualanModel::where('id',$id)->delete();
        return redirect('/penjualan')->with('success','Berhasil hapus data');
    }

    public function edit($id)
    {
        $penjualan = PenjualanModel::where('id',$id)->first();
        $data_barang = BarangModel::all();
        $data = ([
            'penjualan' => $penjualan,
            'barang'    => $data_barang,
        ]);
        return view('dashboard/penjualan/edit')->with($data);
    }

    public function proses_edit( Request $request, $id )
    {
        $nama_brg = $request->id_barang;
        $jumlah_brg = $request->jumlah;
        $suplier = $request->suplier;

        $data = ([
            'id_barang'   => $nama_brg,
            'jumlah'        => $jumlah_brg,
            'suplier'       => $suplier,
        ]);
        $saved = [
            'id_barang'   => $nama_brg,
            'suplier'     => $suplier,
        ];
        PenjualanModel::where('id',$id)->update($data);
        if ($saved) {
            # kalau auth sukses maka proses disini
            return redirect('/penjualan')->with('success', 'Berhasil Update Data');
        }else{
            // kalau auth gagal
            return redirect('/edit_penjualan')->withErrors('error', 'Gagal Update Data');
        }
    }
}
