<li class="menu-item">

     <a href="{{ $link }}" class="menu-item-link {{ Str::contains(Request::url(), $link) ? 'active': '' }}">
        <span class="text-dark">         
            <i class="{{ $class }} mr-2 fa-fw"></i>
            {{ $name }}
        </span>
    </a>
</li>