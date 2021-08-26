
<nav class="navbar navbar-expand-md  bg-dark text-white shadow-sm border-bottom" style='background: linear-gradient(to right, #343A40 10% ,#6C757D 100%);'>
    <div class="container">

        <div class="" style="height: max-content;" >
            <div class=" h4 text-center p-4 mt-2"
                 style="">
                School Management System <i class='fa fa-school'></i>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest('admin')
                    <li class="nav-item btn btn-success">
                        <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }} <i class='fa fa-sign-in-alt'></i></a>
                        
                    </li>

                @else
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.register') }}">{{ __('New Admin') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.postlogout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('admin.postlogout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

