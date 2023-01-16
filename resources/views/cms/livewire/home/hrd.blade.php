<div class="row">
    @foreach ($hrds as $hrd)
        <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="card {{ $bgClass[$loop->index % 6] }} text-white mb-4">
                <div class="card-body text-center">
                    <div class="mt-3"><i class="{{ $hrd["icon"] }} fa-3x"></i></div>
                    <div class="mt-3"><h4>{{ $hrd["total"] }}</h4></div>
                    <div>{{ $hrd["name"] }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a draggable="false" class="small text-white stretched-link" href="{{ $hrd["url"] }}">
                        {{ trans("index.view_data") }}
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
