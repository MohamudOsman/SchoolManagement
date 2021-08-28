<!DOCTYPE html>
    <html>

    @include('layouts.head')

        <body style="background: linear-gradient(to right, rgba(51, 2, 2, 0.698) 0% ,rgba(0, 0, 255, 0.37) 100%);">

            @include('layouts.nav')

            <div class="row" style="font-family:'Cairo', 'sans-serif'">

                <!--=================================preloader -->

                @include('layouts.main-sidebar-teacher')

                    @yield('page-header')
                    <div class="page-title col-md-9 mb-30 mt-20" style="height: max-content;position:relative;">
                        @yield('content')
                        @include('layouts.footer')
                    </div>
                </div>



            @include('layouts.footer-scripts')

        </body>

    </html>
