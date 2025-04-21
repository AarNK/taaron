@extends('layouts.admin.app')

@section('title','Barang Masuk')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              @include('admin.barangmasuk.create')
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
                <th>Tambah</th>
                <th>More</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($barang_masuks as $barangmasuk)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $barangmasuk->created_at ?? "-"}}</td>
                  <td>{{ $barangmasuk->barang->kategori->name ?? "-"}}</td>
                  <td>{{ $barangmasuk->barang->name ?? "-"}}</td>
                  <td>{{ $barangmasuk->barang->satuan->name ?? "-"}}</td>
                  <td>{{ $barangmasuk->stoktambah ?? "-"}}</td>
                  <td>
                    <div style="display: flex; gap: 10px;">
                      @include('admin.barangmasuk.edit')
                      @include('admin.barangmasuk.delete')
                    </div>
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

