<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('admin.dashboard') }}">
            <h2><b>Admin Panel</b></h2>
        </a>
        <!-- User -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin.dashboard') }}">
                            <h2><b>Admin Panel</b></h2>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.management') }}">
                        <i class="ni ni-credit-card text-primary"></i> {{ __('Management') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.agency')}}" role="button" aria-expanded="true"
                       aria-controls="navbar-examples">
                        <i class="ni ni-circle-08" style="color: #f4645f;"></i>{{ __('Agency') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.credits')}}">
                        <i class="ni ni-credit-card text-blue"></i> {{ __('Promotions') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.call.rates')}}">
                        <i class="ni ni-note-03 text-orange"></i> {{ __('users') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.sinch')}}">
                        <i class="ni ni-sound-wave text-danger"></i> {{ __('Streams') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.reports.index')}}">
                        <i class="ni ni-bullet-list-67 text-info"></i> {{ __('Reports') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.gifts.index')}}">
                        <i class="ni ni-box-2 text-pink"></i> {{ __('Gifts') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.settings')}}">
                        <i class="ni ni-button-play text-danger"></i> {{ __('Videos') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.badges.index')}}">
                        <i class="ni ni-badge text-info"></i> {{ __('Badges') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.withdrawal.index')}}">
                        <i class="ni ni-settings-gear-65 text-pink"></i> {{ __('Withdrawal') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.settings')}}">
                        <i class="ni ni-diamond text-primary"></i> Add Beans Diamonds
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run text-orange"></i>{{ __('Logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
