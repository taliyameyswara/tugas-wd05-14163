@extends('layout.main')

@section('sidebar')
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                                                                                                           with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dokter.dashboard') }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dokter.periksa') }}" class="nav-link ">
                    <p>
                        Periksa
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dokter.obat') }}" class="nav-link active">
                    <p>
                        Obat
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Obat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    {{-- FORM --}}
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Manajemen Obat</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('dokter.obat.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Obat</label>
                                        <input type="text" name="nama_obat" class="form-control" id="exampleInputEmail1"
                                            placeholder="Input obat's name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kemasan</label>
                                        <input type="text" name="kemasan" class="form-control" id="exampleInputEmail1"
                                            placeholder="Input kemasan's name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Harga</label>
                                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1"
                                            placeholder="Input the price">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambah Obat</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="card">
                        {{-- OBAT --}}
                        <div class="card-header">
                            <h3 class="card-title">List Obat</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Kemasan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obats as $obat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $obat->id }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ $obat->kemasan }}</td>
                                        <td>{{ $obat->harga }}</td>
                                        <td class="d-flex ">
                                            <a href="{{ route('dokter.obat.edit', $obat->id) }}" type="button" class="btn btn-warning mr-2">Edit</a>
                                            <form action="{{ route('dokter.obat.delete', $obat->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
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
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
