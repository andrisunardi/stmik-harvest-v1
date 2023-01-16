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
                            <a draggable="false" href="" target="_blank" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-capitalize">
                                        {{ $activity->log_name }} -
                                        {{ $activity->subject ? $activity->subject->id : trans("index.not_found") }}</h5>
                                    <small class="text-capitalize">{{ $activity->event }}</small>
                                </div>
                                <p class="mb-1">{!! $activity->description !!}</p>
                                <div><small>{{ $activity->causer->name }}</small></div>
                                <small>{{ $activity->created_at->format("l, H:i:s") }} {{ $activity->created_at->isoFormat("LL") }}</small>
                            </a>
                        @endforeach
                    </div>

                    {{ $activities->links("{$subDomain}.layouts.pagination") }}
                </div>

                <div class="card-footer bg-info"></div>

            </div>
        </div>
    </div>
</div>
