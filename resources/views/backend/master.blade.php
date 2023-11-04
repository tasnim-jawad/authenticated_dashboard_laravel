@include('backend.layout.header')
        @include('backend.layout.topnav')
        <div id="layoutSidenav">
            @include('backend.layout.sidenav')
            <div id="layoutSidenav_content">

                @yield('main_content')

                @include('backend.layout.copyright')
            </div>
        </div>
@include('backend.layout.footer')
