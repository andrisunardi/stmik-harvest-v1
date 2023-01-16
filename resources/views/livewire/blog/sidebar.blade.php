<div class="col-12 col-md-5 col-lg-4 col-xl-3 mb-2 order-last order-md-first">
    <div class="card">
        <ul class="listview flush transparent image-listview text">
            <li>
                <a draggable="false" href="{{ $slug ? route("blog.category.view", ["slug" => $slug]) : route("blog.category.index") }}" class="item">
                    <ion-icon name="arrow-back-outline" class="me-2"></ion-icon>
                    <div class="in">
                        <div>{{ trans("index.back_to") }} {{ $name ?? trans("index.all_category") }}</div>
                    </div>
                </a>
            </li>
            @foreach($blogCategories as $blogCategory)
                <li>
                    <a draggable="false" href="{{ route("blog.category.view", ["slug" => $blogCategory->slug]) }}" class="item {{ $blogCategory->id == $id ? "bg-primary text-white" : null }}">
                        <div class="in">
                            <div class="{{ $blogCategory->id == $id ? "text-white" : null }}">{{ $blogCategory->name }}</div>
                            <span class="badge {{ $blogCategory->id == $id ? "badge-light" : "badge-primary" }}">
                                {{ $blogCategory->blogs->count() }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
