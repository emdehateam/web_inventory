@extends('layout/layoutdashboard')
@section('konten')
    

<div class="box">
    <div class="box-header">
      <a href="/penjualan" class="btn btn-warning mx-5 my-3"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="/proses_tambah_penjualan">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                        @foreach ($barang as $item)
                            <option value="{{ $item->id_barang }}" class="form-control">{{ $item->nama_barang }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" @required(true)> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Masuk</label>
                    <input type="date" class="form-control" name="tgl_masuk" placeholder="Tgl" @required(true)>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Barang</label>
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Barang" @required(true)>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Suplier</label>
                    <input type="text" class="form-control" name="suplier" placeholder="Suplier Barang" @required(true)>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Tambah Barang</button>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->
    


@endsection