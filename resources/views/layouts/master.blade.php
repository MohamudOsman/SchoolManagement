<!DOCTYPE html>
    <html>

    @include('layouts.head')

        <body >

            @include('layouts.nav')

            <div class="row" style="font-family:'Cairo', 'sans-serif'">

                <!--=================================preloader -->

                @include('layouts.main-sidebar')
                
                    @yield('page-header')
                    <div class="page-title col-md-9 mb-30 mt-20" style="height: max-content;position:relative;">
                        @yield('content')
                        @include('layouts.footer')
                    </div>
                </div>
            


            @include('layouts.footer-scripts')

        </body>

    </html>
