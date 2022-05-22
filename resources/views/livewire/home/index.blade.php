@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="slider__container slider__fixed_height slider__position--relative">
        <div class="slider__activation__wrap owl-carousel owl-theme">
            @foreach ($data_slider as $slider)
                <div class="slide text__align--left slider__bg__color--1 fornt__image--right" >
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider__display--center cd-intro">
                                    <div class="cd-intro-content mask-2">
                                        <div class="slider__inner content-wrapper">
                                            <div>
                                                <h1>{{ $slider->translate_name }}</h1>
                                                <p>{!! html_entity_decode($slider->translate_description) !!}</p>
                                                <div class="slider__btn action-wrapper">
                                                    <a draggable="false" class="htc__btn btn--theme" href="{{ $slider->button_link }}">{{ $slider->translate_button_name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide slider__bg__color--2 text__align--left fornt__image--right-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-xl-7">
                                <div class="slider__display--center cd-intro">
                                    <div class="slider__inner cd-intro-content scale">
                                        <h1>MOBILE UX COURSE</h1>
                                        <p>The differences between desktop and mobile UX are so vast, and deepen so fast.</p>
                                        <div class="slider__btn">
                                            <a draggable="false" class="htc__btn btn--theme" href="courses-details.html">learn more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide slider__bg__color--3 text__align--left fornt__image--right-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider__display--center cd-intro">
                                    <div class="slider__inner cd-intro-content mask">
                                        <h1  data-content="English Test"><span>English Test</span></h1>
                                        <p>Determine your proficiency level in English by taking our free Online English Test.</p>
                                        <div class="slider__btn action-wrapper">
                                            <a draggable="false" class="htc__btn btn--theme" href="cart.html">ORDER NOW!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="htc__offer__area bg--theme">
        <div class="container">
            <div class="row">
                @foreach ($data_offer as $offer)
                    <div class="col-md-6 col-lg-3 ">
                        <div class="offer text-center {{ $loop->first ? null : "offer__separator" }}">
                            <h2>{{ $offer->translate_name }}</h2>
                            <p>{!! html_entity_decode($offer->translate_description) !!}</p>
                            <div class="offer__btn">
                                <a draggable="false" class="htc__btn btn--transparent btn--small" href="{{ $offer->button_link }}">
                                    {{ $offer->translate_button_name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="col-lg-6">
                    <div class="about">
                        <div class="section__title text-left">
                            <h2 class="title__line">{{ trans("general.Welcome To") }} {{ trans("general.Yayasan STMIK Harvest") }}</h2>
                            <p>{{ trans("general.College for Future Technopreneur") }}</p>
                        </div>
                        <p class="about__details">{!! html_entity_decode($setting->translate_about_us) !!}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__thumb">
                        {{-- <img draggable="false" class="img-fluid rounded w-100" src="{{ asset("images/our-values-2.webp") }}" alt="{{ trans("page.Our Values") }} - 2 - {{ env("APP_TITLE") }}"> --}}
                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/wROkewUpfe8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__counterup__area ptb--70" data--black__overlay="4" style="background-image: url(images/bg/1.jpg); background-repeat: no-repeat; background-attachment: scroll;  background-size: cover;">
        <div class="container">
            <div class="row counterup__wrap">
                <!-- Start Single Fact -->
                <div class="col-lg-3 col-md-6">
                    <div class="funfact">
                        <div class="fact__icon">
                            <i class="icon ion-university"></i>
                        </div>
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count ">
                                    <span class="count odometer" data-count="98">00</span><span>%</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>Graduates</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Fact -->
                <!-- Start Single Fact -->
                <div class="col-lg-3 col-md-6">
                    <div class="funfact">
                        <div class="fact__icon">
                            <i class="icon ion-ribbon-b"></i>
                        </div>
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count">
                                    <span class="count odometer" data-count="30">00</span><span>+</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>Certified Teachers</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Fact -->
                <!-- Start Single Fact -->
                <div class="col-lg-3 col-md-6">
                    <div class="funfact">
                        <div class="fact__icon">
                            <i class="icon ion-podium"></i>
                        </div>
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count">
                                    <span class="count odometer" data-count="7">0</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>Student Campuses</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Fact -->
                <!-- Start Single Fact -->
                <div class="col-lg-3 col-md-6">
                    <div class="funfact">
                        <div class="fact__icon">
                            <i class="icon ion-person-stalker"></i>
                        </div>
                        <div class="fact__details">
                            <div class="funfact__count__inner">
                                <div class="fact__count">
                                    <span class="count odometer" data-count="5959">0000</span>
                                </div>
                            </div>
                            <div class="fact__title">
                                <h2>Students</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Fact -->
            </div>
        </div>
    </section>
    <!-- End Our CounterUp Area -->
    <!-- Start popular Courses Area -->
    <section class="popular__courses__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Section Title -->
                    <div class="section__title text-center">
                        <h2 class="title__line">POPULAR COURSES</h2>
                        <p>The Best In Our School</p>
                    </div>
                    <!-- End Section Title -->
                </div>
            </div>
            <div class="row">
                <div class="popular__courses__wrap indicator__style--1 owl-carousel owl-theme clearfix mt--30 xs-mt-0">
                    <!-- Start Single Courses -->
                    <div class="courses">
                        <div class="courses__thumb">
                            <a draggable="false" href="#"><img draggable="false" src="images/course/1.jpg" alt="courses images"></a>
                            <div class="courses__hover__info">
                                <div class="courses__hover__action">
                                    <div class="courses__hover__thumb">
                                        <img draggable="false" src="images/course/sm-img/1.png" alt="small images">
                                    </div>
                                    <h4><a draggable="false" href="#">Derek Spafford</a></h4>
                                    <span class="crs__separator">/</span>
                                    <p>Professor</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses__details">
                            <div class="courses__details__inner">
                                <h2><a draggable="false" href="courses-details.html">Mathematics and Statistics</a></h2>
                                <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                            </div>
                            <ul class="courses__meta">
                                <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                <li class="crs__price">$60.00</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Courses -->
                    <!-- Start Single Courses -->
                    <div class="courses">
                        <div class="courses__thumb">
                            <a draggable="false" href="#"><img draggable="false" src="images/course/2.jpg" alt="courses images"></a>
                            <div class="courses__hover__info">
                                <div class="courses__hover__action">
                                    <div class="courses__hover__thumb">
                                        <img draggable="false" src="images/course/sm-img/2.png" alt="small images">
                                    </div>
                                    <h4><a draggable="false" href="#">Derek Spafford</a></h4>
                                    <span class="crs__separator">/</span>
                                    <p>Professor</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses__details">
                            <div class="courses__details__inner">
                                <h2><a draggable="false" href="courses-details.html">History and Modern Languages</a></h2>
                                <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                            </div>
                            <ul class="courses__meta">
                                <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                <li class="crs__price">$60.00</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Courses -->
                    <!-- Start Single Courses -->
                    <div class="courses">
                        <div class="courses__thumb">
                            <a draggable="false" href="#"><img draggable="false" src="images/course/1.jpg" alt="courses images"></a>
                            <div class="courses__hover__info">
                                <div class="courses__hover__action">
                                    <div class="courses__hover__thumb">
                                        <img draggable="false" src="images/course/sm-img/1.png" alt="small images">
                                    </div>
                                    <h4><a draggable="false" href="#">Derek Spafford</a></h4>
                                    <span class="crs__separator">/</span>
                                    <p>Professor</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses__details">
                            <div class="courses__details__inner">
                                <h2><a draggable="false" href="courses-details.html">Mathematics and Statistics</a></h2>
                                <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                            </div>
                            <ul class="courses__meta">
                                <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                <li class="crs__price">$60.00</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Courses -->
                    <!-- Start Single Courses -->
                    <div class="courses">
                        <div class="courses__thumb">
                            <a draggable="false" href="#"><img draggable="false" src="images/course/2.jpg" alt="courses images"></a>
                            <div class="courses__hover__info">
                                <div class="courses__hover__action">
                                    <div class="courses__hover__thumb">
                                        <img draggable="false" src="images/course/sm-img/2.png" alt="small images">
                                    </div>
                                    <h4><a draggable="false" href="#">Derek Spafford</a></h4>
                                    <span class="crs__separator">/</span>
                                    <p>Professor</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses__details">
                            <div class="courses__details__inner">
                                <h2><a draggable="false" href="courses-details.html">History and Modern Languages</a></h2>
                                <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                            </div>
                            <ul class="courses__meta">
                                <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                <li class="crs__price">$60.00</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Courses -->
                    <!-- Start Single Courses -->
                    <div class="courses">
                        <div class="courses__thumb">
                            <a draggable="false" href="#"><img draggable="false" src="images/course/3.jpg" alt="courses images"></a>
                            <div class="courses__hover__info">
                                <div class="courses__hover__action">
                                    <div class="courses__hover__thumb">
                                        <img draggable="false" src="images/course/sm-img/3.png" alt="small images">
                                    </div>
                                    <h4><a draggable="false" href="#">Nipa Bali</a></h4>
                                    <span class="crs__separator">/</span>
                                    <p>Professor</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses__details">
                            <div class="courses__details__inner">
                                <h2><a draggable="false" href="courses-details.html">Physics and Philosophy</a></h2>
                                <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                            </div>
                            <ul class="courses__meta">
                                <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                <li class="crs__free">Free</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Courses -->
                    <!-- Start Single Courses -->
                    <div class="courses">
                        <div class="courses__thumb">
                            <a draggable="false" href="#"><img draggable="false" src="images/course/3.jpg" alt="courses images"></a>
                            <div class="courses__hover__info">
                                <div class="courses__hover__action">
                                    <div class="courses__hover__thumb">
                                        <img draggable="false" src="images/course/sm-img/3.png" alt="small images">
                                    </div>
                                    <h4><a draggable="false" href="#">Nipa Bali</a></h4>
                                    <span class="crs__separator">/</span>
                                    <p>Professor</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses__details">
                            <div class="courses__details__inner">
                                <h2><a draggable="false" href="courses-details.html">Physics and Philosophy</a></h2>
                                <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                            </div>
                            <ul class="courses__meta">
                                <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                <li class="crs__free">Free</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Courses -->
                </div>
            </div>
        </div>
    </section>
    <!-- End popular Courses Area -->
    <!-- Start Coutdown Area -->
    <section class="our__countdown__area ptb--100" data--theme__overlay="6" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-7">
                    <div class="countdown__wrap">
                        <div class="countdown__inner">
                            <h4>GET 100s OF ONLINE COURSES FOR FREE</h4>
                            <h2>REGISTER NOW</h2>
                        </div>
                        <div class="ml-countdown-thumb">
                            <div class="box-timer">
                            <div class="countbox timer-grid">
                                <div  data-countdown="2023/03/01"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-5">
                    <div class="create__free__account__form">
                        <h2><i class="icon ion-android-lock"></i>Create Your Free Account Now !</h2>
                        <div class="account__form__box">
                            <input type="text"  placeholder="Your Name *">
                            <input type="email"  placeholder="Email *">
                            <input type="tel"  placeholder="Phone *">
                            <div class="acount__btn">
                                <a draggable="false" class="htc__btn btn--theme btn--smll" href="#">Get it now</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Coutdown Area -->
    <!-- Start upcoming Area -->
    <section class="our__upcoming__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Section Title -->
                    <div class="section__title text-center">
                        <h2 class="title__line">Upcoming events</h2>
                        <p>Upcoming Educational Events for your future career.</p>
                    </div>
                    <!-- End Section Title -->
                </div>
            </div>
            <div class="row upcoming__wrap mt-6">
                <!-- Start Single Upcoming Event -->
                <div class="col-lg-6">
                    <div class="upcoming">
                        <div class="upcoming__inner">
                            <div class="upcoming__thumb">
                                <a draggable="false" href="#">
                                    <img draggable="false" src="images/event/1.jpg" alt="upcoming images">
                                </a>
                            </div>
                            <div class="upcoming__hover__info">
                                <div class="upcoming__hover__action">
                                    <div class="upcoming__event__time">
                                        <div class="event__time">
                                            <span>25</span>
                                            <span>june</span>
                                        </div>
                                        <span class="event__separator"></span>
                                        <ul class="event__location">
                                            <li><i class="icon ion-android-time"></i>8:00 AM - 5:00 PM</li>
                                            <li><i class="icon ion-ios-location"></i>Second Quad</li>
                                        </ul>
                                    </div>
                                    <div class="upcoming__details hidden-xs">
                                        <p>College Eucharist (Justin Martyr of Rome) at Bartlemas Chapel</p>
                                    </div>
                                    <div class="event__btn">
                                        <a draggable="false" class="htc__btn btn--transparent" href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Upcoming Event -->
                <!-- Start Single Upcoming Event -->
                <div class="col-lg-6 mt-6 mt-lg-0">
                    <div class="upcoming">
                        <div class="upcoming__inner">
                            <div class="upcoming__thumb">
                                <a draggable="false" href="#">
                                    <img draggable="false" src="images/event/2.jpg" alt="upcoming images">
                                </a>
                            </div>
                            <div class="upcoming__hover__info">
                                <div class="upcoming__hover__action">
                                    <div class="upcoming__event__time">
                                        <div class="event__time">
                                            <span>25</span>
                                            <span>june</span>
                                        </div>
                                        <span class="event__separator"></span>
                                        <ul class="event__location">
                                            <li><i class="icon ion-android-time"></i>8:00 AM - 5:00 PM</li>
                                            <li><i class="icon ion-ios-location"></i>Second Quad</li>
                                        </ul>
                                    </div>
                                    <div class="upcoming__details hidden-xs">
                                        <p>Joint Roman Catholic Mass at Corpus Christi College Chapel</p>
                                    </div>
                                    <div class="event__btn">
                                        <a draggable="false" class="htc__btn btn--transparent" href="#">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Upcoming Event -->
            </div>
        </div>
    </section>
    <!-- End upcoming Area -->
    <!-- Start Testimonial Area -->
    <section class="our__testimonial__area pt--80 pb--110" style="background: rgba(0, 0, 0, 0) url(images/bg/3.jpg) no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Section Title -->
                    <div class="section__title text-center section--white">
                        <h2 class="title__line">testimonials</h2>
                        <p>How real people said about Education</p>
                    </div>
                    <!-- End Section Title -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Testimonial Wrap -->
                    <div class="testimonial-wrap">
                        <div class="testimonial-image-slider text-center">
                            <!-- Start Single Testimg -->
                            <div class="sin-testiImage">
                                <div class="text-thumb">
                                    <img draggable="false" src="images/test/client/1.png" alt="testimonial 1"/>
                                </div>
                                <div class="test-info">
                                    <h4>Nipa Bali</h4>
                                    <p>Chief Exceutive.</p>
                                </div>
                            </div>
                            <!-- End Single Testimg -->
                            <!-- Start Single Testimg -->
                            <div class="sin-testiImage">
                                <div class="text-thumb">
                                    <img draggable="false" src="images/test/client/2.png" alt="testimonial 1" />
                                </div>
                                <div class="test-info">
                                    <h4>Samira</h4>
                                    <p>Chief Exceutive</p>
                                </div>
                            </div>
                            <!-- End Single Testimg -->
                            <!-- Start Single Testimg -->
                            <div class="sin-testiImage">
                                <div class="text-thumb">
                                    <img draggable="false" src="images/test/client/3.png" alt="testimonial 1"/>
                                </div>
                                <div class="test-info">
                                    <h4>Chapa</h4>
                                    <p>Chief Exceutive</p>
                                </div>
                            </div>
                            <!-- End Single Testimg -->
                            <!-- Start Single Testimg -->
                            <div class="sin-testiImage">
                                <div class="text-thumb">
                                    <img draggable="false" src="images/test/client/5.png" alt="testimonial 1"/>
                                </div>
                                <div class="test-info">
                                    <h4>Nipa Bali</h4>
                                    <p>Chief Exceutive.</p>
                                </div>
                            </div>
                            <!-- End Single Testimg -->
                            <!-- Start Single Testimg -->
                            <div class="sin-testiImage">
                                <div class="text-thumb">
                                    <img draggable="false" src="images/test/client/2.png" alt="testimonial 1" />
                                </div>
                                <div class="test-info">
                                    <h4>Samira</h4>
                                    <p>Chief Exceutive</p>
                                </div>
                            </div>
                            <!-- End Single Testimg -->
                            <!-- Start Single Testimg -->
                            <div class="sin-testiImage">
                                <div class="text-thumb">
                                    <img draggable="false" src="images/test/client/3.png" alt="testimonial 1"/>
                                </div>
                                <div class="test-info">
                                    <h4>Chapa</h4>
                                    <p>Chief Exceutive</p>
                                </div>
                            </div>
                            <!-- End Single Testimg -->
                        </div>
                    </div>
                    <!--End Testimonial Wrap -->
                    <!--Start Testimonial Text Slider -->
                    <div class="testimonial-text-slider text-center">
                        <div class="sin-testiText">
                            <p>Great theme, excellent support. We had a few small issues with getting the dropdown menus to work and support fixed them and let us know which files were changed so that we could replicate from dev to production. Very happy both with the theme and the company. Highly recommended.</p>
                        </div>
                        <div class="sin-testiText">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
                        </div>
                        <div class="sin-testiText">
                            <p>Great theme, excellent support. We had a few small issues with getting the dropdown menus to work and support fixed them and let us know which files were changed so that we could replicate from dev to production. Very happy both with the theme and the company. Highly recommended.</p>
                        </div>
                        <div class="sin-testiText">
                            <p>Great theme, excellent support. We had a few small issues with getting the dropdown menus to work and support fixed them and let us know which files were changed so that we could replicate from dev to production. Very happy both with the theme and the company. Highly recommended.</p>
                        </div>
                        <div class="sin-testiText">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
                        </div>
                        <div class="sin-testiText">
                            <p>Great theme, excellent support. We had a few small issues with getting the dropdown menus to work and support fixed them and let us know which files were changed so that we could replicate from dev to production. Very happy both with the theme and the company. Highly recommended.</p>
                        </div>
                    </div>
                    <!--End Testimonial Text Slider -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->
    <!-- Start Our Blog Area -->
    <section class="our__blog__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Section Title -->
                    <div class="section__title text-center">
                        <h2 class="title__line">our blogs</h2>
                        <p>Education news all over the world.</p>
                    </div>
                    <!-- End Section Title -->
                </div>
            </div>
            <div class="row our__blog__wrap mt-6 mb-n6">
                <!-- Start Single Blog -->
                <div class="col-lg-4 col-xl-4 col-md-6 mb-6">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a draggable="false" href="blog-details.html">
                                <img draggable="false" src="images/blog/1.jpg" alt="blog images">
                            </a>
                            <div class="blog__date">
                                <span>AUGUST 8, 2022</span>
                            </div>
                        </div>
                        <div class="blog__details">
                            <h2><a draggable="false" href="blog-details.html">Iceland’s volcano timelapse</a></h2>
                            <p>The term minimalism is also used to describe a trend in design and architecture where in the subject is reduced to its n...</p>
                            <div class="blog__btn">
                                <a draggable="false" class="read__more__btn" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-lg-4 col-xl-4 col-md-6 mb-6">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a draggable="false" href="blog-details.html">
                                <img draggable="false" src="images/blog/2.jpg" alt="blog images">
                            </a>
                            <div class="blog__date">
                                <span>AUGUST 8, 2022</span>
                            </div>
                        </div>
                        <div class="blog__details">
                            <h2><a draggable="false" href="blog-details.html">Iceland’s volcano timelapse</a></h2>
                            <p>The term minimalism is also used to describe a trend in design and architecture where in the subject is reduced to its n...</p>
                            <div class="blog__btn">
                                <a draggable="false" class="read__more__btn" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-lg-4 col-xl-4 col-md-6 mb-6">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a draggable="false" href="blog-details.html">
                                <img draggable="false" src="images/blog/3.jpg" alt="blog images">
                            </a>
                            <div class="blog__date">
                                <span>AUGUST 8, 2022</span>
                            </div>
                        </div>
                        <div class="blog__details">
                            <h2><a draggable="false" href="blog-details.html">Iceland’s volcano timelapse</a></h2>
                            <p>The term minimalism is also used to describe a trend in design and architecture where in the subject is reduced to its n...</p>
                            <div class="blog__btn">
                                <a draggable="false" class="read__more__btn" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </section>

    <section class="our__newsletter__area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="newsletter__wrap bg--5">
                        <h2>You want to know more infomation?<br> Send us a mail!</h2>
                        <div class="newsletter__form">
                            <div class="input__box">
                                <div id="mc_embed_signup">
                                    <form action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                            <div class="news__input">
                                                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your email..." required>
                                            </div>
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                            <div class="clearfix subscribe__btn"><input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="bst__btn btn--white__color">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map-contacts">
        <div id="googleMap">
            <iframe src="{{ env("CONTACT_GOOGLE_MAPS_IFRAME") }}"></iframe>
        </div>
    </div>
</div>
