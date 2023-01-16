@section("title", $pageTitle)
@section("icon", $pageIcon)

<div>
    <div class="row">
        @foreach ($pages as $page)
            <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-2">
                <div class="card bg-{{ $page["class"] }} text-white mb-4">
                    <div class="card-body text-center">
                        <div class="mt-3"><i class="{{ $page["icon"] }} fa-3x"></i></div>
                        <div class="mt-3"><h4>Report</h4></div>
                        <div>{{ $page["name"] }}</div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ $page["url"] }}">
                            {{ trans("index.view_data") }}
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
