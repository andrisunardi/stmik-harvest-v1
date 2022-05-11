@unless ($breadcrumbs->isEmpty())
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!is_null($breadcrumb->url) && !$loop->last)
            <a draggable="false" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
            <span class="text-white">/</span>
        @else
            <span class="text-white">{{ $breadcrumb->title }}</span>
        @endif
    @endforeach
@endunless
