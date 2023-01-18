@section("title", $eventCategory ? $eventCategory->translate_name : trans("index.event"))
@section("icon", "fas fa-calendar")
@section("event-active", "active")

<div>
    <section class="htc__courses__grid bg__white ptb--80">
        <div class="container">

            @include("layouts.alert")

            @if ($eventCategory)
                <div class="section__title text-center mb--40">
                    <h2 class="title__line">{{ $eventCategory->translate_name }}</h2>
                    <p>{!! html_entity_decode($eventCategory->translate_description) !!}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="courses__tab__wrap">
                        <div class="courses__grid__inner">
                            <div class="view-mode-wrap">
                                <ul class="view-mode nav" role="tablist">
                                    <li role="presentation" class="list-view"><a draggable="false" class="active" href="#list-view" role="tab" data-bs-toggle="tab"><i class="icon ion-navicon-round"></i></a></li>
                                    <li role="presentation" class="grid-view"><a draggable="false" href="#grid-view" role="tab" data-bs-toggle="tab"><i class="icon ion-grid"></i></a></li>
                                </ul>
                                <span class="show__result">
                                    {{ trans("index.showing") }}
                                    {{ ($events->perPage() * $events->currentPage()) - $events->perPage() + 1 }}
                                    {{ trans("index.to") }}
                                    {{ $events->hasMorePages() ? $events->perPage() * $events->currentPage() : $events->total() }}
                                    {{ trans("index.of") }}
                                    {{ $events->total() }} {{ trans("index.results") }}
                                </span>
                            </div>
                            <div class="courses__searsh__box">
                                <input wire:model="search" type="search" placeholder="{{ trans("index.search_event") }}">
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
                                @foreach ($events as $event)
                                    <div class="col-md-6">
                                        <div class="courses">
                                            <div class="courses__thumb">
                                                <a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}">
                                                    <img draggable="false" class="img-fluid w-100" src="{{ $event->assetImage() }}" alt="{{ $event->altImage() }}">
                                                </a>
                                                <div class="courses__hover__info">
                                                    <div class="courses__hover__action">
                                                        <div class="courses__hover__thumb">
                                                            <img draggable="false" src="{{ asset("images/logo-square.png") }}" class="rounded-circle" style="width:50px" alt="Administrator - {{ $event->altImage() }}">
                                                        </div>
                                                        <h4>Administrator</h4>
                                                        <span class="crs__separator">/</span>
                                                        <p>Admin</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="courses__details">
                                                <div class="courses__details__inner">
                                                    <h2><a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}">{{ $event->translate_title }}</a></h2>
                                                    <p>{{ $event->translate_short_body }}</p>
                                                </div>
                                                <ul class="courses__meta">
                                                    <li class="crs__price">
                                                        <i class="icon ion-calendar"></i>
                                                        {{ Date::parse($event->start)->isoFormat("LL") }}
                                                    </li>
                                                </ul>
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
                                @foreach ($events as $event)
                                    <div class="col-12">
                                        <div class="single__list__view clearfix">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="single__list">
                                                        <a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}">
                                                            <img draggable="false" class="img-fluid w-100" src="{{ $event->assetImage() }}" alt="{{ $event->altImage() }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="list__view__inner">
                                                        <div class="list__view__info">
                                                            <div class="list__sm__image">
                                                                <img draggable="false" src="{{ asset("images/logo-square.png") }}" class="rounded-circle" style="width:50px" alt="Administrator - {{ env("APP_TITLE") }}">
                                                            </div>
                                                            <h4>Administrator</h4>
                                                            <span class="crs__separator">/</span>
                                                            <p>Admin</p>
                                                        </div>
                                                        <div class="lst__view__details">
                                                            <h2><a draggable="false" href="{{ route("event.view", ["slug" => $event->slug]) }}">{{ $event->translate_title }}</a></h2>
                                                            <p>{{ $event->translate_short_body }}</p>
                                                        </div>
                                                        <ul class="list__meta">
                                                            <li class="crs__price">
                                                                <i class="icon ion-calendar"></i>
                                                                {{ Date::parse($event->start)->isoFormat("LL") }}
                                                            </li>
                                                        </ul>
                                                        <ul class="list__meta">
                                                            <li>
                                                                <i class="icon ion-map"></i>
                                                                {{ $event->location }}
                                                            </li>
                                                        </ul>
                                                        <div class="list__btn">
                                                            <a draggable="false" class="htc__btn btn--theme" href="{{ route("event.view", ["slug" => $event->slug]) }}">{{ trans("index.read_more") }}</a>
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

                @livewire('event-sidebar-component')

            </div>

            {{ $events->links("layouts.pagination") }}
        </div>
    </section>
</div>
