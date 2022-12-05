<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.style')
</head>
<body>

    <div class="container-scroller">
        @include('components.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('components.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> @yield('pagetitle') </h3>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    @yield('breadOld')
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @yield('breadNow')
                                </li>
                            </ol>
                        </nav>
                    </div>
                    @yield('content')
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>

    @include('includes.script')
</body>
</html>