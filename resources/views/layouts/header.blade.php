<div class="row header mb-3">
    <div class="col-12">
        <div class="p-2 bg-danger d-flex justify-content-between align-items-center rounded">
            <button class="show-sidebar-btn btn btn-danger d-block d-lg-none">
                <i class="feather-menu text-light" style="font-size: 2em;"></i>
            </button>
            <div class="dropdown">
                <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/img/user-default-photo.png') }}" class="user-img shadow-sm" alt="">
                    <span class="ml-0 ml-md-2 d-none d-md-inline-block">
                        {{ auth::user()->name }}
                    </span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('profile.edit.password') }}">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        logout
                    </a>

                </div>

            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
