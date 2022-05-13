@unless ($breadcrumbs->isEmpty())
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!is_null($breadcrumb->url) && !$loop->last)
            <a draggable="false" class="breadcrumb-item" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
            <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
        @else
            <span class="breadcrumb-item active">{{ $breadcrumb->title }}</span>
        @endif
    @endforeach
@endunless
