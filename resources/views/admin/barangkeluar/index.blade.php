@extends('layouts.admin.app')

@section('title','Barang Keluar')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              @include('admin.barangkeluar.create')
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Barang Keluar</th>
                <th>More</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($barang_keluars as $barangkeluar)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $barangkeluar->created_at ?? "-" }}</td>
                  <td>{{ $barangkeluar->barang->kategori->name ?? "-"}}</td>
                  <td>{{ $barangkeluar->barang->name ?? "-"}}</td>
                  <td>{{ $barangkeluar->barang->satuan->name ?? "-"}}</td>
                  <td>{{ $barangkeluar->stokkurang ?? "-"}}</td>
                  <td>
                      @include('admin.barangkeluar.edit')
                      @include('admin.barangkeluar.delete')
                  </td>
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

