@foreach($menuitems as $item)
    @if($item->parent == 0)
        @if($item->role == 'user')
            @if(Auth::check())
                @if($item->children->count())
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">{{ $item->menu_nev }}</span>
                        </a>
                        <div class="dropdown-menu m-0">
                            @foreach($item->children as $child)

                            <a href="{{ url($child->view) }}" class="dropdown-item">{{ $child->menu_nev }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ url($item->view) }}" class="nav-item nav-link {{ request()->is($item->view) ? 'active' : ''  }}">{{ $item->menu_nev }}</a>
                @endif
                @endif

        @endif
        @if($item->role == 'admin')
            @if(Auth::check() && Auth::user()->role === 'admin')
                @if($item->children->count())
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">{{ $item->menu_nev }}</span>
                        </a>
                        <div class="dropdown-menu m-0">
                            @foreach($item->children as $child)

                                <a href="{{ url($child->view) }}" class="dropdown-item">{{ $child->menu_nev }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ url($item->view) }}" class="nav-item nav-link {{ request()->is($item->view) ? 'active' : ''  }}">{{ $item->menu_nev }}</a>
                @endif         @endif
        @endif
        @if($item->role == 'none')
            @if($item->children->count())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">{{ $item->menu_nev }}</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        @foreach($item->children as $child)

                            <a href="{{ url($child->view) }}" class="dropdown-item">{{ $child->menu_nev }}</a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ url($item->view) }}" class="nav-item nav-link {{ request()->is($item->view) ? 'active' : ''  }}">{{ $item->menu_nev }}</a>
            @endif
        @endif
    @endif
@endforeach


