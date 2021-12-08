<div id="sidebar" class="sidebar">
    <div class="sidebar-overlay"></div>
    <div class="sidebar-logo" style="height: 61px;">
        <a class="navbar-brand mr-0 d-inline-block" href="{{url('/')}}"
           style="background-image: url('./assets/images/logo.png')"></a>
    </div>
    <div class="navbar p-0">
        <ul class="nav w-100 flex-column" id="navigation">
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="ml-2">Bảng quản trị</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('currencies.index') }}" class="nav-link">
                    <i class="fas fa-money-bill-alt"></i>

                    <span class="ml-2">Currencies</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('news.index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span class="ml-2">News</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.language.setting') }}" class="nav-link">
                    <i class="fas fa-language"></i>
                    <span class="ml-2">Language</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#users" class="nav-link" data-toggle="collapse">
                    <i class="fas fa-users"></i>
                    <span class="ml-2">Account</span>
                </a>
                <div class="collapse" id="users" data-parent="#navigation">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="fal fa-angle-right mr-2"></i>User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                <i class="fal fa-angle-right mr-2"></i>Roles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('permissions.index') }}">
                                <i class="fal fa-angle-right mr-2"></i>Permissions
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link">
                    <i class="fas fa-images"></i>
                    <span class="ml-2">Sliders</span>
                </a>
            </li>
        </ul>
    </div>
</div>
