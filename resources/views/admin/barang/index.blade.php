@extends('layouts.admin.app')

@section('title','Barang')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              @include('admin.barang.create')
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
            <div class="table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>More</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($barangs as $barang)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->name ?? "-"}}</td>
                    <td>{{ $barang->kategori->name ?? "-"}}</td>
                    <td>{{ $barang->satuan->name ?? "-"}}</td>
                    <td>{{ $barang->harga ?? "-"}}</td>
                    <td>
                      <div class="d-flex gap-2">
                        @include('admin.barang.edit')
                        @include('admin.barang.delete')
                      </div>
                    </td>
                  </tr>    
                  @endforeach
                </tbody>
              </table>
            </div>
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

