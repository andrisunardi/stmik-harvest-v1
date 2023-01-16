<nav class="nav nav-pills flex-column flex-sm-row mb-3" id="pills-tab" role="tablist">
    @foreach ($navigations as $navigation)
        <a draggable="false"
            class="flex-sm-fill text-sm-center nav-link {{ $loop->first ? "active" : null }}"
            data-bs-toggle="pill"
            data-bs-target="#pills-{{ $navigation["slug"] }}"
            type="button"
            role="tab"
            aria-controls="pills-{{ $navigation["slug"] }}"
            aria-selected="{{ $loop->first ? "true" : "false" }}"
            @if ($loop->first) aria-current="page" @endif>
            <i class="{{ $navigation["icon"] }}"></i>
            {{ $navigation["name"] }}
        </a>
    @endforeach
</nav>
