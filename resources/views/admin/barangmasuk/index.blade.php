@extends('layouts.admin.app')

@section('title','Barang Masuk')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="card-title">
                <i class="fas fa-boxes mr-2"></i>
                Data Barang Masuk
              </h3>
              <div class="d-flex gap-3 align-items-center">
                @include('admin.barangmasuk.create')
                
                <!-- Import Button -->
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#importModal">
                  <i class="fas fa-file-excel mr-2"></i>
                  Import Excel
                </button>
              </div>
            </div>
            
            <!-- Alert Messages -->
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <strong>Error!</strong> Terjadi kesalahan saat import:
                <ul class="mb-0 mt-2">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
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
                      <div class="d-flex gap-2">
                        @include('admin.barangmasuk.edit')
                        @include('admin.barangmasuk.delete')
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

  <!-- Import Modal -->
  <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="importModalLabel">
            <i class="fas fa-file-excel mr-2"></i>
            Import Data Barang Masuk
          </h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.barangmasuk.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="importFile" class="form-label">
                <i class="fas fa-file-upload mr-2"></i>
                Pilih File Excel
              </label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="file" id="importFile" required class="custom-file-input" accept=".xlsx,.xls" onchange="updateFileName(this)">
                  <label class="custom-file-label" for="importFile" id="fileLabel">
                    <i class="fas fa-file-upload mr-2"></i>
                    Pilih file Excel (.xlsx, .xls)...
                  </label>
                </div>
              </div>
              <small class="form-text text-muted">
                <i class="fas fa-info-circle mr-1"></i>
                Format yang didukung: .xlsx, .xls (Maksimal 5MB)
              </small>
            </div>

            <div class="alert alert-info">
              <div class="d-flex align-items-center">
                <i class="fas fa-download mr-3 text-info"></i>
                <div>
                  <strong>Download Template Excel</strong>
                  <br>
                  <small class="text-muted">Gunakan template ini untuk memastikan format data yang benar</small>
                  <br>
                  <a href="{{ asset('template/template-barangmasuk.xlsx') }}" class="btn btn-sm btn-outline-info mt-2">
                    <i class="fas fa-download mr-1"></i>
                    Download Template
                  </a>
                </div>
              </div>
            </div>

            <div class="card border-warning">
              <div class="card-header bg-warning text-dark">
                <h6 class="mb-0">
                  <i class="fas fa-exclamation-triangle mr-2"></i>
                  Petunjuk Import
                </h6>
              </div>
              <div class="card-body">
                <ul class="mb-0">
                  <li>Pastikan file Excel sesuai dengan template yang disediakan</li>
                  <li>Kolom yang wajib diisi: Kategori, Nama Barang, Satuan, Stok Tambah</li>
                  <li>Data akan otomatis ditambahkan ke stok barang yang sudah ada</li>
                  <li>Jika barang belum ada, akan dibuat otomatis</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times mr-1"></i>
              Batal
            </button>
            <button type="submit" class="btn btn-success" id="importBtn" disabled>
              <i class="fas fa-upload mr-1"></i>
              Import Data
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('styles')
<style>
  .import-section {
    min-width: 300px;
  }
  
  .import-form .card {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }
  
  .import-form .card:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  }
  
  .custom-file-input:lang(id) ~ .custom-file-label::after {
    content: "Pilih File";
  }
  
  .custom-file-label {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  
  .btn-success {
    background-color: #28a745;
    border-color: #28a745;
  }
  
  .btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
  }
  
  .gap-3 {
    gap: 1rem !important;
  }
  
  .alert {
    border-radius: 0.375rem;
  }
  
  .card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #495057;
  }
  
  .form-label {
    font-weight: 500;
    color: #6c757d;
  }
  
  .text-decoration-none {
    text-decoration: none !important;
  }
  
  .text-decoration-none:hover {
    text-decoration: underline !important;
  }
</style>
@endpush

@push('scripts')
<script>
  function updateFileName(input) {
    const fileLabel = document.getElementById('fileLabel');
    if (input.files && input.files[0]) {
      const fileName = input.files[0].name;
      fileLabel.innerHTML = '<i class="fas fa-file-excel mr-2"></i>' + fileName;
    } else {
      fileLabel.innerHTML = '<i class="fas fa-file-upload mr-2"></i>Pilih file...';
    }
  }
  
  // Auto-hide alerts after 5 seconds
  document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(function(alert) {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      });
    }, 5000);
  });
</script>
@endpush

