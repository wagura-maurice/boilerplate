<!DOCTYPE html>
<html lang="{!! str_replace('_', '-', app()->getLocale()) !!}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}">

        <title>{!! config('app.name', 'Laravel') !!}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Vendors -->
        <link rel="stylesheet" href="{!! asset('vendors/css/perfect-scrollbar.css') !!}">
        <link rel="stylesheet" href="{!! asset('vendors/font/bootstrap-icons.css') !!}">

        <!-- Styles -->
        <link rel="stylesheet" href="{!! mix('css/app.css') !!}">
        <link rel="stylesheet" href="{!! mix('css/bootstrap.css') !!}">
        <link rel="stylesheet" href="{!! mix('css/pages/auth.css') !!}">

    </head>
    <body>
        <div id="auth">
            <div class="row h-100">
                <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{!! url('/') !!}"><img src="{!! asset('images/logo.png') !!}" alt="{!! config('app.name') !!}"></a>
                    </div>
                    @yield('content')
                </div>
                    
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <div id="auth-right">

                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script type="text/javascript" src="{!! mix('js/app.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('vendors/dist/perfect-scrollbar.min.js') !!}"></script>
    </body>
</html>