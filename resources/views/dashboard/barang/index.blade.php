@extends('layout/layoutdashboard')
@section('konten')
    

<div class="box">
    <div class="box-header">
      <a href="/tambah_penjualan" class="btn btn-primary mx-5 my-3"><i class="fa fa-plus"></i>Tambah Penjualan</a>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th class="text-center">Nama Barang</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>Rp. {{ number_format(($item->harga_brg), 0, '.', '.')  }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>
                        <a href="/edit_barang/{{$item->id_barang}}" class="btn btn-block btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                        
                        <form action="/hapus_barang/{{ $item->id_barang }}" onsubmit="return confirm('Yakinn mau hapus data?')" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-block btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    
                    <th colspan="4" class="text-right">
                        <h3 class="text-end">
                            Total Barang
                        </h3>
                    </th>
                    <th><h3><b>total_barang</b></h3></th>
                </tr>
                
            </tfoot>
            {{-- <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>TGL Masuk</th>
                    <th>Jumlah</th>
                    <th>Suplier</th>
                    <th>Opsi</th>
                </tr>
                
            </tfoot> --}}
        </table>
    </div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->
    


@endsection