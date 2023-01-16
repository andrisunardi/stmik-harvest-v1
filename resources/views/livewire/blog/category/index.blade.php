@section("title", trans("index.blog_category"))
@section("icon", "fas fa-th-large")
@section("blog-active", "active")

<div>
    <div class="section mt-2">
        <h2 class="text-center h2">@yield("title")</h2>
        <h6 class="text-center h6">
            @if (App::isLocale("en"))
                All Blog Category
            @else
                Semua Kategori Blog
            @endif
        </h6>
    </div>

    <div class="section mt-2 mb-2">
        <div class="card">
            <ul class="listview flush transparent image-listview text">
            @foreach($blogCategories as $blogCategory)
                <li>
                    <a draggable="false" href="{{ route("blog.category.view", ["slug" => $blogCategory->slug]) }}" class="item">
                        <div class="in">
                            <div>{{ $blogCategory->translate_name }}</div>
                            <span class="badge badge-primary">
                                {{ $blogCategory->blogs->count() }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
