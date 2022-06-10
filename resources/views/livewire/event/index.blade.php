@section("name", $event_category ? $event_category->translate_name : trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__blog__area ptb--80 bg__white">
        <div class="container">

            @include("layouts.alert")

            @if ($event_category)
                <div class="section__title text-center mb--40">
                    <h2 class="title__line">{{ $event_category->translate_name }}</h2>
                    <p>{!! html_entity_decode($event_category->translate_description) !!}</p>
                </div>
            @endif

            <div class="row pb--40 htc__blog__wrap">
                @foreach ($data_blog as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog">
                            <div class="blog__thumb">
                                <a draggable="false" href="{{ route("{$menu_slug}.view", ["blog_slug" => $event->slug]) }}">
                                    <img draggable="false" class="img-fluid w-100" src="{{ $event->assetImage() }}" alt="{{ trans("page.{$menu_name}") }} - {{ $event->translate_name }} - {{ env("APP_TITLE") }}">
                                </a>
                                <div class="blog__date">
                                    <span>{{ Date::parse($event->date)->format("d F Y") }}</span>
                                </div>
                            </div>
                            <div class="blog__details">
                                <h2><a draggable="false" href="{{ route("blog.view", ["blog_slug" => $event->slug]) }}">{{ $event->translate_name }}</a></h2>
                                <p>{{ strip_tags(Str::limit($event->translate_description, 300)) }}</p>
                                <div class="blog__btn">
                                    <a draggable="false" class="read__more__btn" href="{{ route("blog.view", ["blog_slug" => $event->slug]) }}">{{ trans("index.Read More") }}</a>
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
