<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('before_head')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP - Simple To Do List App</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
        <!-- Font Awesome CSS -->
        <link href="{{asset('css/all.min.css')}}" rel="stylesheet">
        <!-- Use a single version of DataTables CSS -->
        <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">

        <!-- Include jQuery only once -->
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        <!-- DataTables JS -->
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>    
    @yield('after_head')
</head>
<body class="body-bg">
    <main class="main-content">
        @yield('content')
    </main>
    
    @yield('before_script')
        @include('partials._scripts')
    @yield('after_script')
   
</body>
</html>
