<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CAMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            background: #f5f7fb;
        }

        .page-shell {
            padding-bottom: 3rem;
        }

        .content-card {
            border: 0;
            border-radius: 8px;
            box-shadow: 0 12px 30px rgba(31, 41, 55, 0.08);
        }

        .table thead th {
            background: #eef3f8;
            color: #243042;
            font-weight: 700;
            white-space: nowrap;
        }

        .form-label {
            font-weight: 600;
            color: #263445;
        }

        .page-title {
            color: #172033;
            font-weight: 800;
        }

        .muted-box {
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            background: #f8fafc;
        }
    </style>
</head>
<body>

    @include('components.navbar')

    <div class="container mt-5 page-shell">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('main')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
