
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Admin Dashboard</title>
    <!-- CSS -->
    @include('layouts.partials.styles')
</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.partials.sidebar')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.partials.header')
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        @yield('breadcrumb')
                    </div>
                    <section class="section">
                        @yield('content')
                    </section>
                </div>

                <!-- Footer -->
                @include('layouts.partials.footer')
            </div>
        </div>
    </div>
   
    <!-- JavaScript -->
    @include('layouts.partials.scripts')
</body>

</html>