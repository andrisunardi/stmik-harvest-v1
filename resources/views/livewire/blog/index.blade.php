@section("name", $blog_category ? $blog_category->translate_name : trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__blog__area ptb--80 bg__white">
        <div class="container">

            @include("layouts.alert")

            @if ($blog_category)
                <div class="section__title text-center mb--40">
                    <h2 class="title__line">{{ $blog_category->translate_name }}</h2>
                    <p>{!! html_entity_decode($blog_category->translate_description) !!}</p>
                </div>
            @endif

            <div class="row pb--40 htc__blog__wrap">
                @foreach ($data_blog as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog">
                            <div class="blog__thumb">
                                <a draggable="false" href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">
                                    <img draggable="false" class="img-fluid w-100" src="{{ $blog->assetImage() }}" alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $blog->translate_name }} - {{ env("APP_TITLE") }}">
                                </a>
                                <div class="blog__date">
                                    <span>{{ Date::parse($blog->date)->format("d F Y") }}</span>
                                </div>
                            </div>
                            <div class="blog__details">
                                <h2><a draggable="false" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}">{{ $blog->translate_name }}</a></h2>
                                <p>{{ strip_tags(Str::limit($blog->translate_description, 300)) }}</p>
                                <div class="blog__btn">
                                    <a draggable="false" class="read__more__btn" href="{{ route("blog.view", ["blog_slug" => $blog->slug]) }}">{{ trans("index.read_more") }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $data_blog->links("layouts.pagination") }}
        </div>
    </section>
</div>
