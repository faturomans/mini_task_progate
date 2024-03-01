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


        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .pagination {
            flex: 0;
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
                            <h1 class="h3 mb-0 text-gray-800">Company Data</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Begin Page Content -->
                            <div class="container-fluid">

                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-header py-3">
                                        <a href="{{ route('admin-create-companies') }}"
                                            class="btn btn-primary btn-icon-split" data-bs-toggle="modal"
                                            data-bs-target="#createCompanies">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Add New</span>
                                        </a>
                                        <div class="d-flex justify-content-end">
                                            <form action="{{ route('admin-data-companies') }}" method="GET">
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
                                                        {{-- <th>ID</th> --}}
                                                        <th>Company Name</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Phone</th>
                                                        <th>Action</th>
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
                                                            <td>{{ $row->company_name }}</td>
                                                            <td>{{ $row->company_email }}</td>
                                                            <td>{{ $row->company_address }}</td>
                                                            <td>0{{ $row->company_phone }}</td>
                                                            <td>
                                                                <a href="{{ route('admin-look-companies', $row->id) }}"
                                                                    class="btn btn-warning btn-icon">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </span>
                                                                </a>

                                                                <a href="{{ route('admin-detail-companies', $row->id) }}"
                                                                    class="btn btn-secondary btn-icon">
                                                                    <span class="icon text-white-50">
                                                                        <i class="far fa-eye"></i>
                                                                    </span>
                                                                </a>

                                                                <a href="javascript:void(0);"
                                                                    onclick="deleteData('{{ $row->id }}');"
                                                                    class="btn btn-danger btn-icon">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-trash"></i>
                                                                    </span>
                                                                </a>

                                                                <script>
                                                                    function deleteData(id) {
                                                                        Swal.fire({
                                                                            title: 'Data Akan Di Hapus?',
                                                                            text: "Yakin Data Ingin Di Hapus!",
                                                                            icon: 'warning',
                                                                            showCancelButton: true,
                                                                            confirmButtonColor: '#3085d6',
                                                                            cancelButtonColor: '#d33',
                                                                            confirmButtonText: 'Ya, Hapus Data!'
                                                                        }).then((result) => {
                                                                            if (result.value) {
                                                                                window.location.href = "/companies/delete/" + id + "";
                                                                            }
                                                                        });
                                                                    }
                                                                </script>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="flex-container">
                                                {{ $dataCompanies->links() }}

                                                <a href="{{ route('admin-report-companies') }}" class="show-all-link">
                                                    <p>Show All List</p>
                                                </a>
                                            </div>

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
