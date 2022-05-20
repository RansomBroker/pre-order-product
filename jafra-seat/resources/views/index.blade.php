<!Doctype html>
<html lang="en">
<head>
    @include('includes.meta')

    <title>Jafra Preorder - @yield('title')</title>

    @include('includes.css')
    @include('includes.js')
</head>
<body>
    @include('includes.navbar')
    {{--  content  --}}
    @yield('content')
</body>
</html>
