<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center justify-content-center">
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-danger">Hotel</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-danger" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>

            <x-menu-spacer></x-menu-spacer>

            <x-menu-item name="Home" class="feather-home" link="{{ route('home') }}"></x-menu-item>

            @if(Auth::user()->role == 0)
            <x-menu-spacer></x-menu-spacer>
            <x-menu-title title="User Management"></x-menu-title>
            <x-menu-item name="Users" class="feather-users" link="{{ route('user-manager.index') }}"></x-menu-item>
            
            <x-menu-spacer></x-menu-spacer>
            <x-menu-title title="Hotel Management"></x-menu-title>
            <x-menu-item name="Room Types" class="feather-hard-drive" link="{{ route('hotel-manager.list') }}"></x-menu-item>
            <x-menu-item name="Floor Level" class="feather-layers" link="{{ route('hotel-manager.floorlist') }}"></x-menu-item>
            <x-menu-item name="Room" class="feather-inbox" link="{{ route('hotel-manager.room') }}"></x-menu-item>
            @endif

            @if(Auth::user()->role == 0 || Auth::user()->role == 2)
            <x-menu-item name="Hotel Rooms" class="feather-layout" link="{{ route('hotel-manager.index') }}"></x-menu-item>
            @endif
            <x-menu-spacer></x-menu-spacer>
            
            <x-menu-title title="Hotel Reservation"></x-menu-title>
            <x-menu-item name="Reservation" class="feather-calendar" link="{{ route('hotel-manager.reservelist') }}"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>
            <li class="menu-item">
                <a class="btn btn-outline-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    logout
                </a>
            </li>


        </ul>
    </div>
</div>
