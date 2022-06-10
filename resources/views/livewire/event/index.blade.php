@section("name", $event_category ? $event_category->translate_name : trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__courses__grid bg__white ptb--80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="courses__tab__wrap">
                        <div class="courses__grid__inner">
                            <div class="view-mode-wrap">
                                <ul class="view-mode nav" role="tablist">
                                    <li role="presentation" class="grid-view"><a href="#grid-view" role="tab" data-bs-toggle="tab"><i class="icon ion-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a class="active" href="#list-view" role="tab" data-bs-toggle="tab"><i class="icon ion-navicon-round"></i></a></li>
                                </ul>
                                <span class="show__result">Showing 12- of results</span>
                            </div>
                            <div class="courses__searsh__box">
                                <input type="text" placeholder="Search Courses...">
                                <a href="#"><i class="icon ion-ios-search-strong"></i></a>
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
                                    <div class="col-xl-4 col-md-6">
                                        <div class="courses">
                                            <div class="courses__thumb">
                                                <a href="#"><img src="images/course/11.jpg" alt="courses images"></a>
                                                <div class="courses__hover__info">
                                                    <div class="courses__hover__action">
                                                        <div class="courses__hover__thumb">
                                                            <img src="images/course/sm-img/2.png" alt="small images">
                                                        </div>
                                                        <h4><a href="#">Derek Spafford</a></h4>
                                                        <span class="crs__separator">/</span>
                                                        <p>Professor</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="courses__details">
                                                <div class="courses__details__inner">
                                                    <h2><a href="courses-details.html">Physics and Philosophy</a></h2>
                                                    <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                                </div>
                                                <ul class="courses__meta">
                                                    <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                                    <li class="crs__free">Free</li>
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
                                                        <a href="#">
                                                            <img src="images/course/1.jpg" alt="list view images">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="list__view__inner">
                                                        <div class="list__view__info">
                                                            <div class="list__sm__image">
                                                                <img src="images/course/sm-img/2.png" alt="small images">
                                                            </div>
                                                            <h4><a href="#">Derek Spafford</a></h4>
                                                            <span class="crs__separator">/</span>
                                                            <p>Professor</p>
                                                        </div>
                                                        <div class="lst__view__details">
                                                            <h2><a href="courses-details.html">Mathematics and Statistics</a></h2>
                                                            <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                                        </div>
                                                        <ul class="list__meta">
                                                            <li class="crs__price">$60.00</li>
                                                            <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                                        </ul>
                                                        <div class="list__btn">
                                                            <a class="htc__btn btn--theme" href="courses-details.html">Read More</a>
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
