@extends('layouts.admin.app')

@section('title','Laporan')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Stok Awal</th>
                <th>Tambah</th>
                <th>Kurang</th>
                <th>Stok Akhir</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($laporans as $laporan)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $laporan->created_at ?? "-"}}</td>
                  <td>{{ $laporan->barang->kategori->name ?? "-"}}</td>
                  <td>{{ $laporan->barang->name ?? "-"}}</td>
                  <td>{{ $laporan->barang->satuan->name ?? "-"}}</td>
                  <td>{{ $laporan->stokawal ?? "-"}}</td>
                  <td>{{ $laporan->stoktambah ?? "-"}}</td>
                  <td>{{ $laporan->stokkurang ?? "-"}}</td>
                  <td>{{ $laporan->stokakhir ?? "-"}}</td>
                </tr>    
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection

