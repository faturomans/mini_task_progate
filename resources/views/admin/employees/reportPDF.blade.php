<!DOCTYPE html>
<html>

<head>
    <!-- Include Bootstrap CSS 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            font-size: 14px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="container">
        <h3>Mini Task Progate</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Dapartement</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($dataEmployees as $row)
                    <tr>
                        <td scope="row">{{ $no++ }}
                        <td>{{ $row->full_name }}</td>
                        <td>{{ $row->companies->company_name }}</td>
                        <td>{{ $row->dapartement }}</td>
                        <td>{{ $row->email }}</td>
                        <td>0{{ $row->phone }}</td>
                    </tr>
                @endforeach
                <!-- Tambahkan baris berikut sesuai data yang Anda miliki -->
            </tbody>
        </table>
    </div>

</body>

</html>
