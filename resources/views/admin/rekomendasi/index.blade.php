@extends('layouts.admin.app')

@section('title', 'Rekomendasi')

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
                                    <th>Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Stok Awal</th>
                                    <th>Stok Akhir</th>
                                    <th>Tipe Stok</th>
                                    <th>Rekomendasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekomendasis as $rekomendasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rekomendasi->kategori ?? "-"}}</td>
                                        <td>{{ $rekomendasi->name ?? "-"}}</td>
                                        <td>{{ $rekomendasi->satuan ?? "-"}}</td>
                                        <td>{{ $rekomendasi->stokawal ?? "-"}}</td>
                                        <td>{{ $rekomendasi->stokakhir ?? "-"}}</td>
                                        <td>{{ $rekomendasi->tipestok ?? "-"}}</td>
                                        <td>{{ $rekomendasi->rekom ?? "-"}}</td>
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
