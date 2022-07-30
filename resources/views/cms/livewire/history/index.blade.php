@section("name", trans("page.{$menu_name}"))
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
                            <li class="breadcrumb-item"><a draggable="false" href="{{ route("{$sub_domain}.index") }}"><i class="bi bi-house-door me-1"></i> {{ trans("page.Home") }}</a></li>
                            @if ($menu_type == "index")
                                <li class="breadcrumb-item active" aria-current="page"><i class="@yield("icon") me-1"></i> @yield("name")</li>
                            @else
                                <li class="breadcrumb-item"><a draggable="false" href="javascript:;" wire:click="index"><i class="@yield("icon") me-1"></i> @yield("name")</a></li>
                            @endif
                            @if ($menu_type == "view")
                                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-eye me-1"></i> {{ trans("index.View") }}</li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>

            @include("{$sub_domain}.layouts.alert")

            <div class="notification-area">
                @if ($menu_type == "index")
                    @foreach ($data_log as $log)
                        <a draggable="false" href="javascript:;" wire:click="view({{ $log->id }})">
                            <div class="alert unread custom-alert-3 alert-primary" role="alert">
                                <img draggable="false" class="img-circle me-2" width="35" height="35"
                                    src="{{ $log->admin?->assetImage() }}"
                                    alt="{{ trans("index.Admin") }} - {{ $log->admin?->name }} - {{ env("APP_TITLE") }}">
                                <div class="alert-text w-75">
                                    <h6 class="text-truncate">
                                        {{ $log->admin?->name }} {{ trans("index.has been") }} {{ $log->activity_text }} {{ trans("index.at menu") }} {{ $log->menu?->name }} {{ trans("index.on row") }} {{ $log->row }}
                                    </h6>
                                    <span class="text-truncate">
                                        {{ trans("index.Date Time") }}
                                        {{ $log->updated_at?->format("H:i:s - l, d F Y") }} ({{ $log->updated_at?->diffForHumans() }})
                                    </span>
                                </div>
                                <div class="alert-text w-25 text-end">
                                    <i class="{{ $log->activity_icon }} mt-0"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    <div class="card">
                        <div class="card-body">
                            {{ $data_log->links("{$sub_domain}.layouts.pagination") }}
                        </div>
                    </div>
                @endif

                @if ($menu_type == "view")
                    <div class="card">
                        <div class="card-body direction-rtl">
                            <p>{{ $log->admin?->name }} {{ trans("index.has been") }} {{ $log->activity_text }} {{ trans("index.at menu") }} {{ $log->menu?->name }} {{ trans("index.on row") }} {{ $log->row }}</p>
                            <div class="border-bottom border-top py-4">
                                <p>
                                    <a draggable="false" class="btn btn-creative btn-light" wire:click="index">
                                        <i class="bi bi-arrow-left me-1"></i>
                                        {{ trans("index.Back") }}
                                    </a>
                                </p>
                                <p>{{ trans("index.Admin") }} : {{ $log->admin?->name }}</p>
                                <p>{{ trans("index.Menu") }} : {{ $log->menu?->name }}</p>
                                <p>{{ trans("index.Activity") }} : {{ $log->activity_text }}</p>
                                <p>
                                    {{ trans("index.Active") }} :
                                    <span class="{{ "badge bg-" . Str::successdanger($log->active) }}">
                                        {{ trans("index." . Str::active($log->active), '_')) }}
                                    </span>
                                </p>
                                <p>{{ trans("index.Created By") }} : {{ $log->created_by_admin?->name }}</p>
                                <p>{{ trans("index.Updated By") }} : {{ $log->updated_by_admin?->name }}</p>
                                @if ($log->trashed())
                                    <p>{{ trans("index.Deleted By") }} : {{ $log->deleted_by_admin?->name }}</p>
                                @endif
                                @IF ($log->action != 5)
                                    <a draggable="false" class="btn btn-primary btn-creative btn-sm"
                                        href="{{ $log->menu->id ? route("{$sub_domain}." . Str::slug($log->menu?->name) . ".index") . "?menu_type=view&row={$log->row}" : null }}">
                                        <i class="bi bi-eye me-1"></i>
                                        {{ trans("index.View Data") }}
                                    </a>
                                @endif
                            </div>
                            <p class="mb-0 fz-12 mt-4">
                                <i class="bi bi-clock mx-1"></i>
                                {{ trans("index.Created At") }}
                                {{ $log->created_at?->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $log->created_at?->diffForHumans() }})
                            </p>
                            <p class="mb-0 fz-12 mt-4">
                                <i class="bi bi-clock mx-1"></i>
                                {{ trans("index.Updated At") }}
                                {{ $log->updated_at?->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $log->updated_at?->diffForHumans() }})
                            </p>
                            @if ($log->trashed())
                                <p class="mb-0 fz-12 mt-4">
                                    <i class="bi bi-clock mx-1"></i>
                                    {{ trans("index.Deleted At") }}
                                    {{ $log->deleted_at?->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ $log->deleted_at?->diffForHumans() }})
                                </p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
