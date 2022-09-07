<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 8 CRUD Tutorial From Scratch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('storage/css/app.css')}}">
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container corners p-4">
        <div class="row d-flex justify-content-center align-middle">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>Laravel CRUD</h2>
                </div>
                <div class="pull-right mb-4">
                @if(Request::is('companies'))
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
                @else
                    <a class="btn btn-success" href="{{url()->previous()}}">Back</a>
                @endif
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        @yield('content')
    </div>

</body>

</html>
