<div>
    @foreach ($sidebars as $sidebar)
        @role($sidebar["roles"])
            @can([$sidebar["permissions"]])
                @if ($sidebar["category"])
                    <div class="sb-sidenav-menu-heading">{{ $sidebar["category"] }}</div>
                @endif

                @if ($sidebar["pages"])
                    <a draggable="false" class="nav-link {{ Route::is("{$subDomain}.{$sidebar["slug"]}.*") ? "active" : "collapsed" }}" href="javascript:;" data-bs-toggle="collapse" data-bs-target="#{{ $sidebar["slug"] }}" aria-expanded="{{ Route::is("{$subDomain}.{$sidebar["slug"]}.*") ? "false" : "true" }}" aria-controls="{{ $sidebar["slug"] }}">
                        <div class="sb-nav-link-icon"><i class="{{ $sidebar["icon"] }}"></i></div> {{ $sidebar["name"] }}
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down fa-fw"></i></div>
                    </a>

                    <div class="collapse {{ Route::is("{$subDomain}.{$sidebar["slug"]}.*") ? "show" : null }}" id="{{ $sidebar["slug"] }}" aria-labelledby="heading-{{ $sidebar["slug"] }}" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @foreach ($sidebar["pages"] as $page)
                                @role($page["roles"])
                                    @can([$page["permissions"]])
                                        @if ($page["categories"])
                                            <a draggable="false" class="nav-link {{ Route::is("{$subDomain}.{$sidebar["slug"]}.{$page["slug"]}.*") ? "active" : "collapsed" }}" href="javascript:;" data-bs-toggle="collapse" data-bs-target="#{{ $page["slug"] }}" aria-expanded="{{ Route::is("{$subDomain}.{$sidebar["slug"]}.{$page["slug"]}.*") ? "false" : "true" }}" aria-controls="{{ $page["slug"] }}">
                                                <div class="sb-nav-link-icon"><i class="{{ $page["icon"] }}"></i></div> {{ $page["name"] }}
                                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down fa-fw"></i></div>
                                            </a>

                                            <div class="collapse {{ Route::is("{$subDomain}.{$sidebar["slug"]}.{$page["slug"]}.*") ? "show" : null }}" id="{{ $page["slug"] }}" aria-labelledby="heading-{{ $page["slug"] }}" data-bs-parent="#sidenavAccordionPages">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    @foreach ($page["categories"] as $category)
                                                        @role($category["roles"])
                                                            @can([$category["permissions"]])
                                                                <a draggable="false" class="nav-link {{ Route::is("{$subDomain}.{$sidebar["slug"]}.{$page["slug"]}.{$category["slug"]}.*") ? "active" : null }}" href="{{ $category["url"] }}">
                                                                    <div class="sb-nav-link-icon"><i class="{{ $category["icon"] }}"></i></div>{{ $category["name"] }}
                                                                </a>
                                                            @endcan
                                                        @endrole
                                                    @endforeach
                                                </nav>
                                            </div>
                                        @else
                                            <a draggable="false" class="nav-link {{ Route::is("{$subDomain}.{$sidebar["slug"]}.{$page["slug"]}.*") ? "active" : null }}" href="{{ $page["url"] }}">
                                                <div class="sb-nav-link-icon"><i class="{{ $page["icon"] }}"></i></div>{{ $page["name"] }}
                                            </a>
                                        @endif
                                    @endcan
                                @endrole
                            @endforeach
                        </nav>
                    </div>
                @else
                    <a draggable="false" class="nav-link {{ Route::is("{$subDomain}.{$sidebar["slug"]}.*") ? "active" : null }}" href="{{ $sidebar["url"] }}">
                        <div class="sb-nav-link-icon"><i class="{{ $sidebar["icon"] }}"></i></div> {{ $sidebar["name"] }}
                    </a>
                @endif
            @endcan
        @endrole
    @endforeach
</div>
