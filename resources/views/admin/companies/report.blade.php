@extends('layouts-admin.partials-admin.main')
@section('layout-utama')
    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-form {
            margin-right: 10px;
        }
    </style>

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

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">List Company Data = {{ $jumlah }}</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Begin Page Content -->
                            <div class="container-fluid">

                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-header py-3">
                                        <a href="{{ route('admin-reportPDF-companies') }}"
                                            class="btn btn-danger btn-icon-split" data-bs-toggle="modal"
                                            data-bs-target="#createCompanies">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-file-pdf"></i>
                                            </span>
                                            <span class="text">Report</span>
                                        </a>
                                        <div class="d-flex justify-content-end">
                                            <form action="{{ route('admin-report-companies') }}" method="GET">
                                                <input type="search" id="" name="search" placeholder="Search"
                                                    class="form-control"autocomplete="off">
                                            </form>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Company Name</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Phone</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($dataCompanies as $index => $row)
                                                        <tr>
                                                            <th scope="row">{{ $index + $dataCompanies->firstItem() }}
                                                            </th>
                                                            {{-- <td>0{{ $row->company_id }}</td> --}}
                                                            <td>{{ $row->company_name }}</td>
                                                            <td>{{ $row->company_email }}</td>
                                                            <td>{{ $row->company_address }}</td>
                                                            <td>0{{ $row->company_phone }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

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
