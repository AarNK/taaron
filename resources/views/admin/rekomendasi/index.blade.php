@extends('layouts.admin.app')

@section('title', 'Rekomendasi')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Stok Awal</th>
                                        <th>Stok Akhir</th>
                                        <th>Jumlah Terjual</th>
                                        <th>Rekomendasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rekomendasis as $rekomendasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rekomendasi->barang->kategori->name ?? '-' }}</td>
                                            <td>{{ $rekomendasi->barang->name ?? '-' }}</td>
                                            <td>{{ $rekomendasi->barang->satuan->name ?? '-' }}</td>
                                            <td>{{ $rekomendasi->stokawal ?? '-' }}</td>
                                            <td>{{ $rekomendasi->stokakhir ?? '-' }}</td>
                                            <td>{{ $rekomendasi->stokkurang ?? '-' }}</td>
                                            <td>
                                                @if ($rekomendasi->stokkurang >= 50)
                                                    <span class="badge badge-success">sering dibeli</span>
                                                @elseif ($rekomendasi->stokkurang >= 15)
                                                    <span class="badge badge-secondary">netral</span>
                                                @else
                                                    <span class="badge badge-danger">jarang dibeli</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No recommendations available.</td>
                                        </tr>
                                    @endforelse
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
