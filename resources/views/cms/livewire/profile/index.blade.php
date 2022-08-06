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
                            <li class="breadcrumb-item"><a draggable="false" href="{{ route("{$sub_domain}.index") }}"><i class="bi bi-house-door me-1"></i> {{ trans("index.home") }}</a></li>
                            @if ($menu_type == "index")
                                <li class="breadcrumb-item active" aria-current="page"><i class="@yield("icon") me-1"></i> @yield("name")</li>
                            @else
                                <li class="breadcrumb-item"><a draggable="false" href="javascript:;" wire:click="index"><i class="@yield("icon") me-1"></i> @yield("name")</a></li>
                            @endif
                            @if ($menu_type == "edit-profile")
                                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil me-1"></i> {{ trans("index.edit_profile") }}</li>
                            @endif
                            @if ($menu_type == "change-password")
                                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-lock me-1"></i> {{ trans("index.change_password") }}</li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>

            @include("{$sub_domain}.layouts.alert")

            <div class="card user-info-card mb-3">
                <div class="card-body d-flex align-items-center">
                    <div class="user-profile me-3">
                        <img draggable="false"
                            src="{{ Auth::user()->assetImage() }}"
                            alt="{{ Auth::user()->altImage() }}">
                        <i class="bi bi-pencil"></i>
                        <form action="#">
                            <input class="form-control" type="file" />
                        </form>
                    </div>
                    <div class="user-info">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                            <span class="badge bg-warning ms-2 rounded-pill">{{ Auth::user()->access->name }}</span>
                        </div>
                        <p class="mb-0">{{ Auth::user()->username }}</p>
                    </div>
                </div>
            </div>

            <div class="card user-data-card">
                <div class="card-header text-white
                    {{ $menu_type == "edit-profile" ? "bg-info" : "bg-primary" }}
                    {{ $menu_type == "change-password" ? "bg-success" : "bg-primary" }}
                ">
                    @yield("name")
                </div>

                <div class="card-body">

                    @include("{$sub_domain}.livewire.{$menu_slug}.button")

                    @if ($menu_type == "index")
                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.access") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->access->name }}
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.name") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->name }}
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.email") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.username") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->username }}
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.active") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                <span class="{{ "badge bg-" . Str::successdanger(Auth::user()->active) }}">
                                    {{ trans("index." . Str::slug(Str::active(Auth::user()->active), '_')) }}
                                </span>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.created_by") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->created_by?->name }}
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.updated_by") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->updated_by?->name }}
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.created_at") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->created_at?->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ Auth::user()->created_at?->diffForHumans() }})
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <h6>{{ trans("index.updated_at") }}</h6>
                            </div>
                            <div class="col-sm-6 col-md-8 col-lg-9 col-xl-10">
                                {{ Auth::user()->created_at?->format("H:i:s - l, d F Y") }} <br class="d-md-none"> ({{ Auth::user()->created_at?->diffForHumans() }})
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 col-sm-auto">
                                <a draggable="false" class="btn btn-danger w-100" href="{{ route("{$sub_domain}.logout.index") }}">
                                    <i class="bi bi-box-arrow-right me-1"></i>
                                    {{ trans("index.logout") }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($menu_type == "edit-profile")
                        @include("{$sub_domain}.livewire.{$menu_slug}.edit-profile")
                    @endif

                    @if ($menu_type == "change-password")
                        @include("{$sub_domain}.livewire.{$menu_slug}.change-password")
                    @endif
                </div>

                <div class="card-footer
                    {{ $menu_type == "edit-profile" ? "bg-info" : "bg-primary" }}
                    {{ $menu_type == "change-password" ? "bg-success" : "bg-primary" }}
                ">
                </div>
            </div>
        </div>
    </div>
</div>
