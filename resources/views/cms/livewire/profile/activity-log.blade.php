@section("title", $pageTitle)
@section("icon", $pageIcon)

<div>

    @include("{$subDomain}.livewire.{$pageCategorySlug}.button")

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

                <div class="card-header text-white bg-info">
                    <i class="@yield("icon") fa-fw"></i>
                    @yield("title")
                </div>

                <div class="card-body">
                    <div class="list-group mb-3">
                        @foreach ($activities as $activity)
                            <button class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-capitalize">
                                        {{ $activity->log_name }} - {{ $activity->subject_id }}
                                    </h5>
                                    <small class="text-capitalize">{{ $activity->event }}</small>
                                </div>
                                <p class="mb-1">{!! $activity->description !!}</p>
                                <div><small>{{ $activity->causer->name }}</small></div>
                                <small>
                                    {{ $activity->created_at->format("l, H:i:s") }}
                                    {{ $activity->created_at->isoFormat("LL") }}
                                </small>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        @if (Arr::exists($activity->changes, ["old"]))
                                            <h6>{{ trans("index.old") }}</h6>
                                            <pre><code>{{ json_encode($activity->changes["old"], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if (Arr::exists($activity->changes, ["attributes"]))
                                            <h6>{{ trans("index.new") }}</h6>
                                            <pre><code>{{ json_encode($activity->changes["attributes"], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                </div>
                            </button>
                        @endforeach
                    </div>

                    {{ $activities->links("{$subDomain}.layouts.pagination") }}
                </div>

                <div class="card-footer bg-info"></div>

            </div>
        </div>
    </div>
</div>
