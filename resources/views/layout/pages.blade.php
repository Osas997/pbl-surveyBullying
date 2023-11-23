<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="shortcut icon" href="{{asset('assets/img/blue-logo.png')}}" type="image/x-icon">


    <title>@yield('title')</title>
</head>

<body>
    <main class="relative h-full ">
        @yield('content')
    </main>
    @hasSection ('script')
    @yield('script')
    @endif
</body>

</html>