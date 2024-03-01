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

                            <form action="{{ route('admin-update-companies', ['id' => $detail->id]) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                {{-- <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company ID</label>
                                    <input type="number" name="company_id" class="form-control" id="exampleInputEmail1"
                                        aria-de scribedby="emailHelp" value="{{ $detail->company_id }}" readonly>
                                    @error('company_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $detail->company_name }}" readonly>
                                    @error('company_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Email</label>
                                    <input type="email" name="company_email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $detail->company_email }}" readonly>
                                    @error('company_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Address</label>
                                    <input type="text" name="company_address" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $detail->company_address }}" readonly>
                                    @error('company_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Company Phone</label>
                                    <input type="number" name="company_phone" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $detail->company_phone }}" readonly>
                                    @error('company_phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

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
