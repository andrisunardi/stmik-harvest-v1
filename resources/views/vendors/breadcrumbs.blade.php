@unless ($breadcrumbs->isEmpty())
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!is_null($breadcrumb->url) && !$loop->last)
            <li class="breadcrumb-item active" aria-current="page">
                <i class="{{ $breadcrumb->icon }}"></i>
                <a draggable="false" href="{{ $breadcrumb->url }}">
                    {{ $breadcrumb->title }}
                </a>
            </li>
        @else
            <li class="breadcrumb-item">
                <i class="{{ $breadcrumb->icon }}"></i>
                {{ $breadcrumb->title }}
            </li>
        @endif
    @endforeach
@endunless
