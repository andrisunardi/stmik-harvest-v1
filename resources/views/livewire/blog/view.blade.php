@section("title", $blog->translate_title)
@section("icon", "fas fa-eye")
@section("blog-active", "active")

<div>
    <section class="htc__blog__details__container bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="htc__blog__left__sidebar">
                        <div class="blog__details__top">
                            <h2>{{ $blog->translate_title }}</h2>
                            <ul class="blog__meta">
                                <li>
                                    <i class="icon ion-android-calendar"></i>
                                    {{ trans("index.created_at") }} :
                                    {{ $blog->date?->isoFormat("LL") }}
                                </li>
                                <li class="meta__separator">
                                    <i class="icon ion-person"></i>
                                    {{ trans("index.posted_by") }} :
                                    Administrator
                                </li>
                                <li class="meta__separator">
                                    <i class="icon ion-pricetag"></i>
                                    {{ trans("index.category") }} :
                                    @if ($blog->blogCategory)
                                        <a draggable="false" href="{{ route("blog.index") . "?category={$blog->blogCategory->slug}" }}">
                                            {{ $blog->blogCategory->translate_name }}
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="blog__details__thumb">
                            <a draggable="false" href="{{ $blog->assetImage() }}" target="_blank">
                                <img draggable="false" class="img-fluid w-100" src="{{ $blog->assetImage() }}" alt="{{ $blog->altImage() }}">
                            </a>
                        </div>
                        <div class="htc__blog__details">
                            <div class="single__details text-pre">{!! html_entity_decode($blog->translate_body) !!}</div>
                        </div>

                        <div class="blog__related__post mt--90">
                            <h2 class="title__style--3">{{ trans("index.related_blog") }}</h2>
                            <div class="blog__related__inner">
                                <div class="row">
                                    @foreach ($relatedBlogs as $relatedBlog)
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <div class="blog">
                                                <div class="blog__thumb">
                                                    <a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}">
                                                        <img draggable="false" class="img-fluid w-100" src="{{ $relatedBlog->assetImage() }}" alt="{{ $relatedBlog->altImage() }}">
                                                    </a>
                                                    <div class="blog__date">
                                                        <span>{{ $relatedBlog->date?->isoFormat("LL") }}</span>
                                                    </div>
                                                </div>
                                                <div class="blog__details">
                                                    <h2><a draggable="false" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}">{{ $relatedBlog->translate_title }}</a></h2>
                                                    <p>{{ $relatedBlog->translate_short_body }}</p>
                                                    <div class="blog__btn">
                                                        <a draggable="false" class="read__more__btn" href="{{ route("blog.view", ["slug" => $relatedBlog->slug]) }}">{{ trans("index.read_more") }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @livewire('blog-sidebar-component')

            </div>
        </div>
    </section>
</div>
