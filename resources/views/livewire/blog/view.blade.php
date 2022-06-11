@section("name", $blog->translate_name)
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__blog__details__container bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="htc__blog__left__sidebar">
                        <div class="blog__details__top">
                            <h2>{{ $blog->translate_name }}</h2>
                            <ul class="blog__meta">
                                <li>
                                    <i class="icon ion-android-calendar"></i>
                                    {{ trans("index.Created At") }} :
                                    {{ Date::parse($blog->date)->format("d F Y") }}
                                </li>
                                <li class="meta__separator">
                                    <i class="icon ion-person"></i>
                                    {{ trans("index.posted_by") }} :
                                    Administrator
                                </li>
                                <li class="meta__separator">
                                    <i class="icon ion-pricetag"></i>
                                    {{ trans("index.Category") }} :
                                    @if ($blog->blog_category)
                                        <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$blog->blog_category->slug}" }}">
                                            {{ $blog->blog_category->translate_name }}
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="blog__details__thumb">
                            <a draggable="false" href="{{ $blog->assetImage() }}" target="_blank">
                                <img draggable="false" class="img-fluid w-100" src="{{ $blog->assetImage() }}" alt="{{ trans("page.{$menu_name}") }} - {{ $blog->translate_name }} - {{ env("APP_TITLE") }}">
                            </a>
                        </div>
                        <div class="htc__blog__details">
                            <div class="single__details">{!! html_entity_decode($blog->translate_description) !!}</div>
                        </div>

                        <div class="blog__related__post mt--90">
                            <h2 class="title__style--3">{{ trans("index.related_blog") }}</h2>
                            <div class="blog__related__inner">
                                <div class="row">
                                    @foreach ($data_other_blog as $other_blog)
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <div class="blog">
                                                <div class="blog__thumb">
                                                    <a draggable="false" href="{{ route("{$menu_slug}.view", ["blog_slug" => $blog->slug]) }}">
                                                        <img draggable="false" class="img-fluid w-100" src="{{ $other_blog->assetImage() }}" alt="{{ trans("page.{$menu_name}") }} - {{ $other_blog->translate_name }} - {{ env("APP_TITLE") }}">
                                                    </a>
                                                    <div class="blog__date">
                                                        <span>{{ Date::parse($other_blog->date)->format("d F Y") }}</span>
                                                    </div>
                                                </div>
                                                <div class="blog__details">
                                                    <h2><a draggable="false" href="{{ route("{$menu_slug}.view", ["blog_slug" => $other_blog->slug]) }}">{{ $other_blog->translate_name }}</a></h2>
                                                    <p>{{ strip_tags(Str::limit($other_blog->translate_description, 100)) }}</p>
                                                    <div class="blog__btn">
                                                        <a draggable="false" class="read__more__btn" href="{{ route("{$menu_slug}.view", ["blog_slug" => $other_blog->slug]) }}">{{ trans("index.Read More") }}</a>
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

                @include("livewire.{$menu_slug}.sidebar")

            </div>
        </div>
    </section>
</div>
