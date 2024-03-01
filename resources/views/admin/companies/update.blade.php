@extends('layouts-admin.partials-admin.main')
@section('layout-utama')

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Partials Sidebar -->
            @include('layouts-admin.partials-admin.sidebar')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Partials Navbar -->
                @include('layouts-admin.partials-admin.navbar')

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        {{--
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Company Data</h1>
                        </div> --}}

                        <!-- Content Row -->
                        <div class="row">

                            <form action="{{ route('admin-update-companies', $look->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $look->company_name }}" autocomplete="off">
                                    @error('company_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Email</label>
                                    <input type="email" name="company_email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $look->company_email }}" autocomplete="off">
                                    @error('company_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Address</label>
                                    <input type="text" name="company_address" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $look->company_address }}" autocomplete="off">
                                    @error('company_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Phone</label>
                                    <input type="number" name="company_phone" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $look->company_phone }}" autocomplete="off">
                                    @error('company_phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Update</span>
                                </button>

                            </form>
                            <!-- Begin Page Content -->
                            <div class="container-fluid">



                            </div>
                            <!-- /.container-fluid -->

                        </div>

                        <!-- Content Row -->

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Partials Footer -->
                @include('layouts-admin.partials-admin.footer')

            </div>

        </div>

    </body>
@endsection
