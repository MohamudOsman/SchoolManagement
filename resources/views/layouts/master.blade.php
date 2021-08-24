<!DOCTYPE html>
    <html>

    @include('layouts.head')

        <body>

            @include('layouts.nav')

            <div class="wrapper" style="font-family:'Cairo', 'sans-serif'">

                <!--=================================preloader -->

                @include('layouts.main-sidebar')
                <div class="content-wrapper">
                    @yield('page-header')
                    <div class="page-title">
                        @yield('content')
                        @include('layouts.footer')
                    </div>
                </div>
            </div>


            @include('layouts.footer-scripts')

        </body>

    </html>
