@section("name", $event_category ? $event_category->translate_name : trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__courses__grid bg__white ptb--80">
        <div class="container">
            <!-- Start Tab Menu -->
            <div class="row">
                <div class="col-12">
                    <div class="courses__tab__wrap">
                        <div class="courses__grid__inner">
                            <!-- Start Tab -->
                            <div class="view-mode-wrap">
                                <ul class="view-mode nav" role="tablist">
                                    <li role="presentation" class="grid-view"><a href="#grid-view" role="tab" data-bs-toggle="tab"><i class="icon ion-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a class="active" href="#list-view" role="tab" data-bs-toggle="tab"><i class="icon ion-navicon-round"></i></a></li>
                                </ul>
                                <span class="show__result">Showing 12- of results</span>
                            </div>
                            <!-- Start Tab -->
                            <!-- Start Courses Search -->
                            <div class="courses__searsh__box">
                                <input type="text" placeholder="Search Courses...">
                                <a href="#"><i class="icon ion-ios-search-strong"></i></a>
                            </div>
                            <!-- End Courses Search -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Menu -->
            <!-- Start Tab Content -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="courses__content__wrap mt--20 list__view__page">
                        <!-- Start Single Content -->
                        <div role="tabpanel" class="single__grid__view popular__courses--5 clearfix tab-pane fade" id="grid-view">
                            <div class="row">
                                <!-- Start Single Courses -->
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
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/13.jpg" alt="courses images"></a>
                                            <div class="courses__hover__info">
                                                <div class="courses__hover__action">
                                                    <div class="courses__hover__thumb">
                                                        <img src="images/course/sm-img/3.png" alt="small images">
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/14.jpg" alt="courses images"></a>
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/5.jpg" alt="courses images"></a>
                                            <div class="courses__hover__info">
                                                <div class="courses__hover__action">
                                                    <div class="courses__hover__thumb">
                                                        <img src="images/course/sm-img/1.png" alt="small images">
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
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/6.jpg" alt="courses images"></a>
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/7.jpg" alt="courses images"></a>
                                            <div class="courses__hover__info">
                                                <div class="courses__hover__action">
                                                    <div class="courses__hover__thumb">
                                                        <img src="images/course/sm-img/3.png" alt="small images">
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/8.jpg" alt="courses images"></a>
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
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/9.jpg" alt="courses images"></a>
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/10.jpg" alt="courses images"></a>
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/10.jpg" alt="courses images"></a>
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
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                                <!-- Start Single Courses -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="courses">
                                        <div class="courses__thumb">
                                            <a href="#"><img src="images/course/12.jpg" alt="courses images"></a>
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
                                                <li class="crs__price">$60.00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Courses -->
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div role="tabpanel" class="single__grid__view clearfix tab-pane fade show active" id="list-view">
                            <div class="row">
                                <!-- Start Single List -->
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
                                <!-- End Single List -->

                                <!-- Start Single List -->
                                <div class="col-12">
                                    <div class="single__list__view clearfix">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="single__list">
                                                    <a href="#">
                                                        <img src="images/course/2.jpg" alt="list view images">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="list__view__inner">
                                                    <div class="list__view__info">
                                                        <div class="list__sm__image">
                                                            <img src="images/course/sm-img/3.png" alt="small images">
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
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <div class="col-12">
                                    <div class="single__list__view clearfix">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="single__list">
                                                    <a href="#">
                                                        <img src="images/course/3.jpg" alt="list view images">
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
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <div class="col-12">
                                    <div class="single__list__view clearfix">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="single__list">
                                                    <a href="#">
                                                        <img src="images/course/4.jpg" alt="list view images">
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
                                <!-- End Single List -->
                                <!-- Start Single List -->
                                <div class="col-12">
                                    <div class="single__list__view clearfix">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="single__list">
                                                    <a href="#">
                                                        <img src="images/course/5.jpg" alt="list view images">
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
                                <!-- End Single List -->
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="htc__blog__right__sidebar mt--50">
                        <!-- Start All Courses -->
                        <div class="htc__blog__courses">
                            <h2 class="title__style--2">All Courses</h2>
                            <ul class="blog__courses">
                                <li><a href="#">Art Course</a></li>
                                <li><a href="#">Sports Course</a></li>
                                <li><a href="#">Math Course</a></li>
                                <li><a href="#">Art Course</a></li>
                                <li><a href="#">Sports Course</a></li>
                                <li><a href="#">Math Course</a></li>
                            </ul>
                        </div>
                        <!-- End All Courses -->
                        <!-- Start Recent Post -->
                        <div class="blog__recent__courses">
                            <h2 class="title__style--2">Recent COURSES</h2>
                            <div class="recent__courses__inner">
                                <!-- Start Single POst -->
                                <div class="single__courses">
                                    <div class="recent__post__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                        </a>
                                    </div>
                                    <div class="recent__post__details">
                                        <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                        <span class="post__price">$60.00</span>
                                    </div>
                                </div>
                                <!-- End Single POst -->
                                <!-- Start Single POst -->
                                <div class="single__courses">
                                    <div class="recent__post__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                        </a>
                                    </div>
                                    <div class="recent__post__details">
                                        <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                        <span class="post__price">$60.00</span>
                                    </div>
                                </div>
                                <!-- End Single POst -->
                                <!-- Start Single POst -->
                                <div class="single__courses">
                                    <div class="recent__post__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                        </a>
                                    </div>
                                    <div class="recent__post__details">
                                        <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                        <span class="post__price">$60.00</span>
                                    </div>
                                </div>
                                <!-- End Single POst -->
                                <!-- Start Single POst -->
                                <div class="single__courses">
                                    <div class="recent__post__thumb">
                                        <a href="blog-details.html">
                                            <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                        </a>
                                    </div>
                                    <div class="recent__post__details">
                                        <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                        <span class="post__price">$60.00</span>
                                    </div>
                                </div>
                                <!-- End Single POst -->
                            </div>
                        </div>
                        <!-- End Recent Post -->
                        <!-- Start BLog Discount -->
                        <div class="blog__discount__area bg--8">
                            <div class="blog__discount__inner">
                                <h4>NEW SCHOOLYEAR</h4>
                                <h2>GET 70% OFF</h2>
                            </div>
                        </div>
                        <!-- End BLog Discount -->
                        <!-- Start Blog TAg -->
                        <div class="blog__tag mt--50">
                            <h2 class="title__style--2">Tags</h2>
                            <ul class="tag__list">
                                <li><a href="#">Art class</a></li>
                                <li><a href="#">class</a></li>
                                <li><a href="#">letter</a></li>
                                <li><a href="#">Sport class</a></li>
                                <li><a href="#">math</a></li>
                                <li><a href="#">color</a></li>
                                <li><a href="#">Art class</a></li>
                                <li><a href="#">class</a></li>
                                <li><a href="#">letter</a></li>
                                <li><a href="#">Sport class</a></li>
                                <li><a href="#">math</a></li>
                                <li><a href="#">color</a></li>
                            </ul>
                        </div>
                        <!-- End Blog TAg -->
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
            <!-- Start Pagenation Area -->
            <div class="row">
               <div class="col-12">
                    <ul class="htc-pagination clearfix">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="icon ion-ios-arrow-right"></i></a></li>
                    </ul>
               </div>
            </div>
            <!-- End Pagenation Area -->
        </div>
    </section>
</div>
