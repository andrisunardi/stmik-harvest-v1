<div class="col-12 col-md-5 col-lg-4 col-xl-3 mb-2 order-last order-md-first">
    <div class="card">
        <ul class="listview flush transparent image-listview text">
            <li>
                <a draggable="false" href="{{ route("news.category.index") }}" class="item">
                    <ion-icon name="arrow-back-outline" class="me-2"></ion-icon>
                    <div class="in">
                        <div>{{ trans("index.back_to") }} {{ $name ?? trans("index.all_category") }}</div>
                    </div>
                </a>
            </li>
            <li>
                <a draggable="false" href="{{ route("news.timeline") }}" class="item">
                    <div class="in">
                        <div>{{ trans("index.timeline") }}</div>
                        <span class="badge badge-danger">{{ trans("index.new") }}</span>
                    </div>
                </a>
            </li>
            @foreach($newsCategories as $newsCategory)
                <li>
                    <a draggable="false" href="{{ route("news.category.view", ["slug" => $newsCategory->slug]) }}" class="item {{ $newsCategory->id == $id ? "bg-primary text-white" : null }}">
                        <div class="in">
                            <div class="{{ $newsCategory->id == $id ? "text-white" : null }}">{{ $newsCategory->name }}</div>
                            <span class="badge {{ $newsCategory->id == $id ? "badge-light" : "badge-primary" }}">
                                {{ $newsCategory->newss->count() }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
