@extends('layouts.admin.app')

@section('title','Kategori')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              @include('admin.kategori.create')
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>More</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($kategoris as $kategori)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kategori->name ?? "-"}}</td>
                  <td>
                    @include('admin.kategori.edit')
                    @include('admin.kategori.delete')
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

