<!Doctype html>
<html lang="en">
<head>
    @include('includes.meta')

    <title>Jafra Preorder - @yield('title')</title>

    @include('includes.admincss')
</head>
<body id="page-top">
    {{-- side and nav--}}
    <div id="wrapper">
        @if(Route::currentRouteName() != 'login')
            @include('includes.sidebar')
        @endif
            {{-- Content Wrapper --}}
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    {{-- Topbar --}}
                    @if(Route::currentRouteName() != 'login')
                        @include('includes.adminnav')
                    @endif
                    @yield('content')
                </div>
            </div>
    </div>
    @include('includes.adminjs')
</body>
