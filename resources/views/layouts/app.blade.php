<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/plugins/fontawesome/all.min.css') }}">
        <link rel="stylesheet" href="{{mix('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <div class="preloader flex-column justify-content align-items-center">
                <p class="animation__shake">Admin LTE</p>
            </div>

            @include('layouts.navigation')

            <!-- Page Heading -->


            <!-- Page Content -->
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                       <div class="row mb-2">
                           <div class="col-sm-6">
                               {{ $header }}
                           </div>
                           <div class="col-sm-6">
                               <ol class="breadcrumb float-sm-right">
                                   {{$breadcrumb ?? null}}
                               </ol>
                           </div>
                       </div>
                    </div>
                </div>
                <section class="content">
                    {{ $slot }}
                </section>
            </div>
            <footer class="main-footer">
                <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
{{--                <div class="float-right d-none d-sm-inline-block">--}}
{{--                    <b>Version</b> 3.2.0-rc--}}
{{--                </div>--}}
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
