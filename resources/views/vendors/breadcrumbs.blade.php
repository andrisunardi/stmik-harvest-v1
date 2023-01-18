@if (Route::is("cms.*"))
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
@else
    @unless ($breadcrumbs->isEmpty())
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <a draggable="false" class="breadcrumb-item" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
            @else
                <span class="breadcrumb-item active text-white fw-bold">{{ $breadcrumb->title }}</span>
            @endif
        @endforeach
    @endunless
@endif
