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


<nav class="bradcaump-inner">
    <a class="breadcrumb-item" href="index.html">Home</a>
    <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
    <span class="breadcrumb-item active">About</span>
</nav>
