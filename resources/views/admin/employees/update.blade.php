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
                            <form action="{{ route('admin-update-emoployees', ['id' => $look->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" name="full_name" class="form-control" id="exampleInputEmail1"
                                        aria-de scribedby="emailHelp" value="{{ $look->full_name }}" autocomplete="off">
                                    @error('full_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="company_id" class="form-label">Company</label>
                                    <select class="form-control" name="company_id" id="company_id"
                                        aria-label="Default select example">
                                        @error('company_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <option disabled value>Pilih</option>
                                        @foreach ($company_ids as $company)
                                            <option value="{{ $company->id }}"
                                                {{ $look->company_id == $company->id ? 'selected' : '' }}>
                                                {{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Dapartement</label>
                                    <input type="text" name="dapartement" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $look->dapartement }}" autocomplete="off">
                                    @error('dapartement')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $look->email }}" autocomplete="off">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $look->phone }}" autocomplete="off">
                                    @error('phone')
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
