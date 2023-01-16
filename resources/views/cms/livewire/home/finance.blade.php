<div class="row">
    @foreach ($finances as $finance)
        <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="card {{ $bgClass[$loop->index % 6] }} text-white mb-4">
                <div class="card-body text-center">
                    <div class="mt-3"><i class="{{ $finance["icon"] }} fa-3x"></i></div>
                    <div class="mt-3"><h4>{{ $finance["total"] }}</h4></div>
                    <div>{{ $finance["name"] }}</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a draggable="false" class="small text-white stretched-link" href="{{ $finance["url"] }}">
                        {{ trans("index.view_data") }}
                    </a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
