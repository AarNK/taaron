@extends('layouts.admin.app')

@section('title','Laporan')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <div class="form-group">
                <label for="monthFilter">Filter by Month:</label>
                <select id="monthFilter" class="form-control" onchange="filterByMonth()">
                    <option value="">Select Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
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

<script>
function filterByMonth() {
    var month = document.getElementById('monthFilter').value;
    var rows = document.querySelectorAll('#example1 tbody tr');
    rows.forEach(row => {
        var date = row.cells[1].innerText;
        if (month === "" || date.includes(`-${month}-`)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
@endsection

