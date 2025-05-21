@extends('layouts.admin.app')

@section('title','Laporan')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
              <div class="form-group mb-0">
                <label for="monthFilter" class="mb-2">Filter by Month:</label>
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
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" style="width: 5%">No</th>
                  <th class="text-center" style="width: 15%">Tanggal</th>
                  <th class="text-center" style="width: 10%">Kategori</th>
                  <th class="text-center" style="width: 15%">Nama Barang</th>
                  <th class="text-center" style="width: 10%">Satuan</th>
                  <th class="text-center" style="width: 10%">Stok Awal</th>
                  <th class="text-center" style="width: 10%">Tambah</th>
                  <th class="text-center" style="width: 10%">Kurang</th>
                  <th class="text-center" style="width: 15%">Stok Akhir</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($laporans as $laporan)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $laporan->created_at ?? "-"}}</td>
                    <td class="text-center">{{ $laporan->barang->kategori->name ?? "-"}}</td>
                    <td class="text-center">{{ $laporan->barang->name ?? "-"}}</td>
                    <td class="text-center">{{ $laporan->barang->satuan->name ?? "-"}}</td>
                    <td class="text-center">{{ $laporan->stokawal ?? "-"}}</td>
                    <td class="text-center">{{ $laporan->stoktambah ?? "-"}}</td>
                    <td class="text-center">{{ $laporan->stokkurang ?? "-"}}</td>
                    <td class="text-center">{{ $laporan->stokakhir ?? "-"}}</td>
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

