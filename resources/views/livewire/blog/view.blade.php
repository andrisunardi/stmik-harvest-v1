@section("title", $blog->translate_title)
@section("icon", "fas fa-th-large")
@section("blog-active", "active")

<div>
    <div class="section mt-2">
        <div class="row">

            @livewire('blog-sidebar-component', [
                "id" => $blog->blogCategory->id,
                "name" => $blog->blogCategory->translate_name,
                "slug" => $blog->blogCategory->slug,
            ])

            <div class="col-12 col-md-7 col-lg-8 col-xl-9 order-first order-md-last">

                <div class="card">
                    <div class="card-body">
                        <a draggable="false" href="#preview" data-bs-toggle="modal" data-bs-target="#preview">
                            <img draggable="false" class="imaged img-rounded border w-100" src="{{ $blog->assetImage() }}" alt="{{ $blog->altImage() }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.image") }}">
                        </a>
                        <h1 class="h1 card-title mt-2">
                            <span  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.title") }}">
                                @yield("title")
                            </span>
                        </h1>
                        <h6 class="h6"><a draggable="false" href="{{ route("portfolio.category.view", ["slug" => $blog->blogCategory->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.category") }}">{{ $blog->blogCategory->name }}</a></h6>
                        <div>
                            <span class="card-subtitle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.date") }}">
                                {{ Date::parse($blog->datetime)->isoFormat("LL") }}
                            </span>
                        </div>
                        <p class="white-space-pre-wrap">{!! $blog->translate_body !!}</p>
                    </div>
                </div>

                <div class="section full mt-2 mb-2">
                    <a draggable="false" href="#share" class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#share">
                        <ion-icon name="share-outline"></ion-icon> {{ trans("index.share_this") }} {{ trans("index.blog") }}
                    </a>
                </div>

                <div class="modal fade action-sheet inset" id="share" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans("index.share_with") }}</h5>
                            </div>
                            <div class="modal-body">
                                <ul class="action-button-list">
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://www.facebook.com/sharer/sharer.php?u={{ Str::substr(route("blog.view", ["slug" => $blog->slug]), 8) }}&quote={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan blog $blog->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share blog $blog->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-facebook">
                                                <ion-icon class="color-facebook" name="logo-facebook"></ion-icon>
                                                Facebook
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://twitter.com/intent/tweet?source={{ route("blog.view", ["slug" => $blog->slug]) }}&text={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan blog $blog->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share blog $blog->name because the results are very good and satisfying. Try to look, thank you." }}&via=DIW_co_id&hashtags=web&hashtags=website&hashtags=jasaweb&hashtags=jasawebsite&hashtags=domain&hashtags=hosting&hashtags=webdesign&hashtags=webservices&hashtags=webdevelopment&hashtags=design&hashtags=webmaster" target="_blank">
                                            <span class="color-twitter">
                                                <ion-icon class="color-twitter" name="logo-twitter"></ion-icon>
                                                Twitter
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl={{ route("blog.view", ["slug" => $blog->slug]) }}&title={{ $blog->name }}&caption={{ $blog->description }}&tags=website" target="_blank">
                                            <span class="color-tumblr">
                                                <ion-icon class="color-tumblr" name="logo-tumblr"></ion-icon>
                                                Tumblr
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="http://pinterest.com/pin/create/button/?url={{ route("blog.view", ["slug" => $blog->slug]) }}&description={{ $blog->description }}" target="_blank">
                                            <span class="color-pinterest">
                                                <ion-icon class="color-pinterest" name="logo-pinterest"></ion-icon>
                                                Pinterest
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="http://www.linkedin.com/shareArticle?mini=true&url={{ Str::substr(route("blog.view", ["slug" => $blog->slug]), 8) }}&title={{ $blog->name }}&summary={{ $blog->description }}&source={{ route("blog.view", ["slug" => $blog->slug]) }}" target="_blank">
                                            <span class="color-linkedin">
                                                <ion-icon class="color-linkedin" name="logo-linkedin"></ion-icon>
                                                Linkedin
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="whatsapp://send?text={{ Str::substr(route("blog.view", ["slug" => $blog->slug]), 8) }} - {{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan blog $blog->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share blog $blog->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-whatsapp">
                                                <ion-icon class="color-whatsapp" name="logo-whatsapp"></ion-icon>
                                                Whatsapp
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://social-plugins.line.me/lineit/share?url={{ route("blog.view", ["slug" => $blog->slug]) }}&text={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan blog $blog->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share blog $blog->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-line">
                                                <ion-icon class="color-line fab fa-line"></ion-icon>
                                                Line
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://telegram.me/share/url?url={{ route("blog.view", ["slug" => $blog->slug]) }}&text={{ Session::get("locale") == "id" ? "Halo sahabat, saya sudah melihat dan ingin membagikan blog $blog->name karena hasilnya sangat bagus dan memuaskan. Coba deh dilihat dulu, terima kasih" : "Hi friends, I have seen and want to share blog $blog->name because the results are very good and satisfying. Try to look, thank you" }}" target="_blank">
                                            <span class="color-telegram">
                                                <ion-icon class="color-telegram fab fa-telegram"></ion-icon>
                                                Telegram
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" class="btn btn-list" href="https://www.blogger.com/blog-this.g?u={{ route("blog.view", ["slug" => $blog->slug]) }}&n={{ $blog->name }}&t={{ $blog->description }}" target="_blank">
                                            <span class="color-blogger">
                                                <ion-icon class="color-blogger fab fa-blogger"></ion-icon>
                                                Blogger
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="section full mb-2">
        <div class="section-heading padding">
            <h2 class="title">{{ trans("index.related_blog") }}</h2>
            <a draggable="false" href="{{ route("blog.category.view", ["slug" => $blog->blogCategory->slug]) }}" class="link text-primary">
                {{ trans("index.view_all") }}
            </a>
        </div>

        <div class="d-none d-sm-block">
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($relatedBlogs as $relatedBlog)
                            <li class="splide__slide">
                                <div class="card h-100">
                                    <a draggable="false" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.image") }}">
                                        <img draggable="false" class="card-img-top lozad w-100" src="{{ $relatedBlog->assetImage() }}" alt="{{ $relatedBlog->altImage() }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <a draggable="false" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.title") }}">
                                                {{ $relatedBlog->name }}
                                            </a>
                                        </h5>
                                        <h5 class="card-subtitle text-center mt-2 mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.date") }}">
                                            {{ $relatedBlog->datetime?->isoFormat("LL") }}
                                        </h5>
                                        <p class="card-text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.description") }}">
                                            {!! $relatedBlog->short_description ?? strip_tags(Str::limit($relatedBlog->description), 160) !!}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}" class="btn btn-primary btn-block btn-sm">
                                            {{ trans("index.read_more") }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="d-sm-none">
            <div class="carousel-single splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($relatedBlogs as $relatedBlog)
                            <li class="splide__slide">
                                <div class="card h-100">
                                    <a draggable="false" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.blog_logo") }}">
                                        <img draggable="false" class="card-img-top lozad w-100" src="{{ $relatedBlog->assetImage() }}" alt="{{ $relatedBlog->altImage() }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            <a draggable="false" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.blog_name") }}">
                                                {{ $relatedBlog->name }}
                                            </a>
                                        </h5>
                                        <h5 class="card-subtitle text-center mt-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.blog_datetime") }}">
                                            {{ $relatedBlog->datetime?->isoFormat("LL") }}
                                        </h5>
                                        <p class="card-text text-center mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="5 {{ trans("index.star") }}">
                                            @for ($a = 0; $a < 5; $a++)
                                                <ion-icon name="star-outline" class="text-warning"></ion-icon>
                                            @endfor
                                        </p>
                                        <p class="card-text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans("index.blog_description") }}">
                                            {!! $relatedBlog->short_description ?? strip_tags(Str::limit($relatedBlog->description), 160) !!}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a draggable="false" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}" class="btn btn-primary btn-block btn-sm">
                                            {{ trans("index.read_more") }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modalbox" id="preview" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@yield("title")</h5>
                    <a draggable="false" href="javascript:void(0);" data-bs-dismiss="modal">{{ trans("index.close") }}</a>
                </div>
                <div class="modal-body p-0">
                    <div class="card">
                        <img draggable="false" class="w-100 lozad-delete" src-delete="{{ asset("images/loading-preview.gif") }}" src="{{ $blog->assetImage() }}" alt="{{ $blog->altImage() }}">
                    </div>

                    <div class="p-2 d-block d-sm-none d-md-block d-lg-none">
                        <div class="alert alert-outline-primary fade show" role="alert">
                            <div>
                                {{ trans("index.please_rotate_your_phone_or_tablet_to_get_optimal_preview") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
