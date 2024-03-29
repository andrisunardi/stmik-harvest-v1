@section("title", $pageTitle)
@section("icon", $pageIcon)

<div wire:init="loadData">
    <div class="row">
        @foreach ($pages as $page)
            @role($page["roles"])
                @can([$page["permissions"]])
                    <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-2">
                        <div class="card {{ $bgClass[$loop->index % 6] }} text-white mb-4">
                            <div class="card-body text-center">
                                <div class="mt-3"><i class="{{ $page["icon"] }} fa-3x"></i></div>
                                <div class="mt-3"><h4>{{ $page["total"] }}</h4></div>
                                <div>{{ $page["name"] }}</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a draggable="false" class="small text-white stretched-link" href="{{ $page["url"] }}">
                                    {{ trans("index.view_data") }}
                                </a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endcan
            @endrole
        @endforeach
    </div>
</div>
