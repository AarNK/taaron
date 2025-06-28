@extends('layouts.admin.app')

@section('title','Jasa')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              @include('admin.jasa.create')
              @include('admin.jasa.import')
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
                <th>Nama Jasa</th>
                <th>Harga</th>
                <th>More</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($jasas as $jasa)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $jasa->name ?? "-"}}</td>
                  <td>{{ $jasa->harga ?? "-"}}</td>
                  <td>
                    @include('admin.jasa.edit')
                    @include('admin.jasa.delete')
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
