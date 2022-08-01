@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

@push("meta")
@endpush

@push("css")
@endpush

@push("script")
@endpush

<div>
    <div class="page-content-wrapper py-3">
        <div class="container-fluid">

            <div class="breadcrumb-wrapper breadcrumb-one mb-3 rounded">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 px-1 py-4">
                            <li class="breadcrumb-item active" aria-current="page"><i class="@yield("icon") me-1"></i> @yield("name")</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @include("{$sub_domain}.layouts.alert")

            <div class="row">
                @php $key = 0; @endphp
                @foreach ($data_menu as $menu)
                    @php $key++ @endphp
                    @if ($key == 1) @php $color = "primary" @endphp @endif
                    @if ($key == 2) @php $color = "secondary" @endphp @endif
                    @if ($key == 3) @php $color = "info" @endphp @endif
                    @if ($key == 4) @php $color = "success" @endphp @endif
                    @if ($key == 5) @php $color = "warning" @endphp @endif
                    @if ($key == 6) @php $color = "danger" @endphp @endif
                    @php $total = "total_" . Str::slug($menu->name, "_") @endphp
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 col-xxl-1 my-2">
                        <a draggable="false" href="{{ route("{$sub_domain}." . Str::slug($menu->name) .".index") }}">
                            <div class="card bg-gradient bg-{{ $color }} h-100">
                                <div class="card-body">
                                    <div class="single-counter-wrap text-center">
                                        <i class="{{ $menu->icon }} mb-2 text-white"></i>
                                        <h4 class="mb-0"><span class="counter text-white">{{ Str::thousand($$total) }}</span></h4>
                                        <span class="solid-line bg-white"></span>
                                        <p class="mb-0 text-white">{{ trans("index.Total") }} {{ $menu->translate_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @if ($key == 6) @php $key = 0 @endphp @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
