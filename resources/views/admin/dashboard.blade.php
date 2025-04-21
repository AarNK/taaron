@extends('layouts.admin.app')

@section('title','Dashboard')

@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <h3>50</h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>Barang Keluar</p>
            </div>
            <div class="icon">
              <i class="ion ion-log-out"></i>
            </div>
            <a href="barangkeluar" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>200</h3>

              <p>Barang Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-log-in"></i>
            </div>
            <a href="barangmasuk" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>10</h3>

              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="ion ion-pricetags"></i>
            </div>
            <a href="kategori" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>5</h3>

              <p>Satuan Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="satuan" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>3</h3>

              <p>Rekomendasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-star"></i>
            </div>
            <a href="rekomendasi" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>7</h3>

              <p>Laporan</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="laporan" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Stok Barang</h3>
            </div>
            <div class="card-body">
              <table id="stokTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Stok Akhir</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($laporans as $laporan)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporan->barang->name ?? '-' }}</td>
                    <td>{{ $laporan->barang->kategori->name ?? '-' }}</td>
                    <td>{{ $laporan->barang->satuan->name ?? '-' }}</td>
                    <td>{{ $laporan->stokakhir ?? '-' }}</td>
                    <td>
                      @if($laporan->stokakhir >= 15)
                        <span class="badge badge-success">Stok Cukup</span>
                      @else
                        <span class="badge badge-danger">Stok Rendah</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

