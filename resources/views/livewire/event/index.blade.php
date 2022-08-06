@section("name", $event_category ? $event_category->translate_name : trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__courses__grid bg__white ptb--80">
        <div class="container">

            @include("layouts.alert")

            @if ($event_category)
                <div class="section__title text-center mb--40">
                    <h2 class="title__line">{{ $event_category->translate_name }}</h2>
                    <p>{!! html_entity_decode($event_category->translate_description) !!}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="courses__tab__wrap">
                        <div class="courses__grid__inner">
                            <div class="view-mode-wrap">
                                <ul class="view-mode nav" role="tablist">
                                    <li role="presentation" class="grid-view"><a draggable="false" href="#grid-view" role="tab" data-bs-toggle="tab"><i class="icon ion-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a draggable="false" class="active" href="#list-view" role="tab" data-bs-toggle="tab"><i class="icon ion-navicon-round"></i></a></li>
                                </ul>
                                <span class="show__result">
                                    {{ trans("index.showing") }}
                                    {{ ($data_event->perPage() * $data_event->currentPage()) - $data_event->perPage() + 1 }}
                                    {{ trans("index.to") }}
                                    {{ $data_event->hasMorePages() ? $data_event->perPage() * $data_event->currentPage() : $data_event->total() }}
                                    {{ trans("index.of") }}
                                    {{ $data_event->total() }} {{ trans("index.results") }}
                                </span>
                            </div>
                            <div class="courses__searsh__box">
                                <input wire:model="search" type="search" placeholder="{{ trans("index.search", ["name" => trans("index.event")]) }}">
                                <a draggable="false" href="javascript:;"><i class="icon ion-ios-search-strong"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="courses__content__wrap mt--20 list__view__page">
                        <div role="tabpanel" class="single__grid__view popular__courses--5 clearfix tab-pane fade" id="grid-view">
                            <div class="row">
                                @foreach ($data_event as $event)
                                    <div class="col-md-6">
                                        <div class="courses">
                                            <div class="courses__thumb">
                                                <a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $event->slug]) }}">
                                                    <img draggable="false" class="img-fluid w-100" src="{{ $event->assetImage() }}" alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $event->translate_name }} - {{ env("APP_TITLE") }}">
                                                </a>
                                                <div class="courses__hover__info">
                                                    <div class="courses__hover__action">
                                                        <div class="courses__hover__thumb">
                                                            <img draggable="false" src="{{ asset("images/logo-square.png") }}" class="rounded-circle" style="width:50px" alt="Administrator - {{ $event->translate_name }} - {{ env("APP_TITLE") }}">
                                                        </div>
                                                        <h4>Administrator</h4>
                                                        <span class="crs__separator">/</span>
                                                        <p>Admin</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="courses__details">
                                                <div class="courses__details__inner">
                                                    <h2><a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $event->slug]) }}">{{ $event->translate_name }}</a></h2>
                                                    <p>{{ strip_tags(Str::limit($event->translate_description, 100)) }}</p>
                                                </div>
                                                {{-- <ul class="courses__meta">
                                                    <li class="crs__price">
                                                        <i class="icon ion-calendar"></i>
                                                        {{ Date::parse($event->start)->format("d M Y H:i") }} -
                                                        {{ Date::parse($event->end)->format("d M Y H:i") }}
                                                    </li>
                                                </ul> --}}
                                                <ul class="courses__meta">
                                                    <li>
                                                        <i class="icon ion-map"></i>
                                                        {{ $event->location }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div role="tabpanel" class="single__grid__view clearfix tab-pane fade show active" id="list-view">
                            <div class="row">
                                @foreach ($data_event as $event)
                                    <div class="col-12">
                                        <div class="single__list__view clearfix">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="single__list">
                                                        <a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $event->slug]) }}">
                                                            <img draggable="false" class="img-fluid w-100" src="{{ $event->assetImage() }}" alt="{{ trans("index." . Str::slug($menu_name, "_")) }} - {{ $event->translate_name }} - {{ env("APP_TITLE") }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="list__view__inner">
                                                        <div class="list__view__info">
                                                            <div class="list__sm__image">
                                                                <img draggable="false" src="{{ asset("images/logo-square.png") }}" class="rounded-circle" style="width:50px" alt="Administrator - {{ $event->translate_name }} - {{ env("APP_TITLE") }}">
                                                            </div>
                                                            <h4>Administrator</h4>
                                                            <span class="crs__separator">/</span>
                                                            <p>Admin</p>
                                                        </div>
                                                        <div class="lst__view__details">
                                                            <h2><a draggable="false" href="{{ route("{$menu_slug}.view", ["event_slug" => $event->slug]) }}">{{ $event->translate_name }}</a></h2>
                                                            <p>{{ strip_tags(Str::limit($event->translate_description, 130)) }}</p>
                                                        </div>
                                                        {{-- <ul class="list__meta">
                                                            <li class="crs__price">
                                                                <i class="icon ion-calendar"></i>
                                                                {{ Date::parse($event->start)->format("d M Y H:i") }} -
                                                                {{ Date::parse($event->end)->format("d M Y H:i") }}
                                                            </li>
                                                        </ul> --}}
                                                        <ul class="list__meta">
                                                            <li>
                                                                <i class="icon ion-map"></i>
                                                                {{ $event->location }}
                                                            </li>
                                                        </ul>
                                                        <div class="list__btn">
                                                            <a draggable="false" class="htc__btn btn--theme" href="{{ route("{$menu_slug}.view", ["event_slug" => $event->slug]) }}">{{ trans("index.Read More") }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                @include("livewire.{$menu_slug}.sidebar")

            </div>

            {{ $data_event->links("layouts.pagination") }}
        </div>
    </section>
</div>
