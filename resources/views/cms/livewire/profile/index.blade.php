@section("title", $pageTitle)
@section("icon", $pageIcon)

<div>

    @include("{$subDomain}.livewire.{$pageCategorySlug}.button")

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">

                <div class="card-header text-white bg-primary">
                    <i class="@yield("icon") fa-fw"></i>
                    @yield("title")
                </div>

                <div class="card-body">

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.role") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->getRoleNames()->join(", ") }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.name") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->name }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.email") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->email }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.username") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->username }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.phone") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->phone }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.active") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            <span class="{{ "badge bg-" . Str::successdanger(Auth::user()->is_active) }}">
                                {{ Str::translate(Str::active(Auth::user()->is_active)) }}
                            </span>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.created_by") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->createdBy?->name }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.updated_by") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->updatedBy?->name }}
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.created_at") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->created_at?->format("H:i:s") }}
                            {{ Auth::user()->created_at?->isoFormat("LL") }}
                            <br class="d-md-none">
                            ({{ Auth::user()->created_at?->diffForHumans() }})
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <h6>{{ trans("index.updated_at") }}</h6>
                        </div>
                        <div class="col-sm-6 col-md-8 col-lg-9 col-xl-9">
                            {{ Auth::user()->updated_at?->format("H:i:s") }}
                            {{ Auth::user()->updated_at?->isoFormat("LL") }}
                            <br class="d-md-none">
                            ({{ Auth::user()->updated_at?->diffForHumans() }})
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-primary"></div>

            </div>
        </div>

        <div class="col-xl-6">
            @if ($lastActivity)
                <div class="card mb-4">
                    <div class="card-header text-white bg-primary">
                        <i class="fas fa-clock fa-fw"></i>
                        {{ trans("index.last_activity") }}
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <button class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-capitalize">
                                        {{ $lastActivity->log_name }} - {{ $lastActivity->subject_id }}
                                    </h5>
                                    <small class="text-capitalize">{{ $lastActivity->event }}</small>
                                </div>
                                <p class="mb-1">{!! $lastActivity->description !!}</p>
                                <div><small>{{ $lastActivity->causer->name }}</small></div>
                                <small>
                                    {{ $lastActivity->created_at->format("l, H:i:s") }}
                                    {{ $lastActivity->created_at->isoFormat("LL") }}
                                </small>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        @if (Arr::exists($lastActivity->changes, ["old"]))
                                            <h6>{{ trans("index.old") }}</h6>
                                            <pre><code>{{ json_encode($lastActivity->changes["old"], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if (Arr::exists($lastActivity->changes, ["attributes"]))
                                            <h6>{{ trans("index.attributes") }}</h6>
                                            <pre><code>{{ json_encode($lastActivity->changes["attributes"], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="card-footer bg-primary"></div>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header text-white bg-primary">
                    <i class="fas fa-key fa-fw"></i>
                    {{ trans("index.roles_and_permissions") }}
                </div>
                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        @foreach (Auth::user()->loadMissing(['roles.permissions'])->roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $role->name }}</div>
                                    @foreach ($role->permissions as $permission)
                                        <div>{{ $loop->iteration }}. {{ $permission->name }}</div>
                                    @endforeach
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $role->permissions->count() }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="card-footer bg-primary"></div>
            </div>
        </div>
    </div>
</div>
