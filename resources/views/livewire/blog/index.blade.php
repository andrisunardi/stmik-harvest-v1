@section("title", $blogCategory ? $blogCategory->translate_name : trans("index.blog"))
@section("icon", "fas fa-newspaper")
@section("blog-active", "active")

<div>
    <section class="htc__blog__area ptb--80 bg__white">
        <div class="container">

            {{-- @include("layouts.alert") --}}

            @if ($blogCategory)
                <div class="section__title text-center mb--40">
                    <h2 class="title__line">{{ $blogCategory->translate_name }}</h2>
                    <p>{!! html_entity_decode($blogCategory->translate_description) !!}</p>
                </div>
            @endif

            <div class="row pb--40 htc__blog__wrap">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog">
                            <div class="blog__thumb">
                                <a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}">
                                    <img draggable="false" class="img-fluid w-100" src="{{ $blog->assetImage() }}" alt="{{ $blog->altImage() }}">
                                </a>
                                <div class="blog__date">
                                    <span>{{ $blog->date?->isoFormat("LL") }}</span>
                                </div>
                            </div>
                            <div class="blog__details">
                                <h2><a draggable="false" href="{{ route("blog.view", ["slug" => $blog->slug]) }}">{{ $blog->translate_title }}</a></h2>
                                <p>{{ $blog->translate_short_body }}</p>
                                <div class="blog__btn">
                                    <a draggable="false" class="read__more__btn" href="{{ route("blog.view", ["slug" => $blog->slug]) }}">
                                        {{ trans("index.read_more") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $blogs->links("layouts.pagination") }}
        </div>
    </section>
</div>
