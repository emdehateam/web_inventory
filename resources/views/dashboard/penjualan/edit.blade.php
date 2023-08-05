@extends('layout/layoutdashboard')
@section('konten')

<div class="box">
    <div class="box-header">
      <a href="/penjualan" class="btn btn-warning mx-5 my-3"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
    </div>
    <div class="m-1">
        @include('layout/message')
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="POST" action="/proses_edit_penjualan/{{$penjualan->id}}">
            @csrf
            @method('PUT')
            
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                        
                        @foreach ($barang as $item)
                            <option value="{{ $item->id_barang }}" class="form-control">{{ $item->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Barang</label>
                    <input type="text" class="form-control" name="jumlah" value="{{$penjualan->jumlah}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Suplier</label>
                    <input type="text" class="form-control" name="suplier" value="{{$penjualan->suplier}}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update Barang</button>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->
    


@endsection