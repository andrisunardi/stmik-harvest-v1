@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="htc__service__area bg__white ptb--80">
        <div class="container">
            <div class="row htc__service__wrap">
                <div class="col-lg-3 col-md-4">
                    <div class="service text-center">
                        <div class="service__icon">
                            <i class="flaticon-student"></i>
                        </div>
                        <div class="service__details">
                            <h2><a href="#">ONLINE COURSES</a></h2>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="service text-center service__color--2">
                        <div class="service__icon">
                            <i class="flaticon-graduate-diploma"></i>
                        </div>
                        <div class="service__details">
                            <h2><a href="#">BECOME AN INSTRUCTOR</a></h2>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Service -->
                <!-- Start Single Service -->
                <div class="col-lg-3 col-md-4">
                    <div class="service text-center service__color--3">
                        <div class="service__icon">
                            <i class="flaticon-graduation-cap"></i>
                        </div>
                        <div class="service__details">
                            <h2><a href="#">MULTI-MEDIA UNITS</a></h2>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Service -->
                <!-- Start Single Service -->
                <div class="col-lg-3 col-md-4">
                    <div class="service text-center service__color--4">
                        <div class="service__icon">
                            <i class="flaticon-classroom"></i>
                        </div>
                        <div class="service__details">
                            <h2><a href="#">SUBSCRIBE COURSES</a></h2>
                            <p>It is a long established fact that a reader will be distracted.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </section>

    <section class="htc__findout__area bg__cat--3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="findout__wrap">
                        <div class="findout__inner">
                            <h2>Find out why students love <span>Educen Education!</span></h2>
                            <div class="findout__btn">
                                <a class="htc__btn btn--yellow" href="#">FIND OUT MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Welcome To") }} Yayasan STMIK Harvest!</h2>
                        <p>College for Future Technopreneur</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about">
                        <p class="about__details">
                            Yayasan STMIK Harvest memiliki sebuah perguruan tinggi bernama STMIK Kuwera <b>(Sedang Proses menjadi STMIK Harvest)</b>. Berdiri sejak 1987, bermula di Jakarta selatan, hingga saat ini masih berdiri dengan visi dan misi yang baru dan lebih terdepan mengikuti perkembangan jaman teknologi saat ini.
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our Vision") }}</h3>
                            Terwujudnya program studi sistem informasi yang unggul dengan menciptakan lulusan yang cerdas dan kompetitif serta memiliki semangat technoprenuership yang memiliki karakter kepemimpinan pada tahun 2025.
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our Mission") }}</h3>
                            Menyelenggarakan pendidikan dalam bidang sistem informasi.<br>
                            <br>
                            Melaksanakan kajian-kajian dan pengembangan guna menghasilkan inovasi yang mendukung pengembangan kehidupan bermasyarakat, khususnya di bidang sistem informasi.<br>
                            <br>
                            Menyiapkan lulusan di bidang sistem informasi yang siap bekerja sekaligus memiliki kemampuan berwirausaha.<br>
                            <br>
                            Mengembangkan pendidikan sistem informasi yang mengedepankan pengembangan karakter di bidang kepemimpinan yang berwawasan global.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about">
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our History") }}</h3>
                            STMIK KUWERA didirikan pada 17 Desember 1987. Pada tahun 2014, STMIK Kuwera melakukan relokasi dan sedang melakukan peberubahan nama menjadi STMIK HARVEST.
                        </p>
                    </div>
                    <div class="about__thumb mt-3">
                        <img draggable="false" src="{{ asset("images/about-us.webp") }}" alt="about images">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End our About Area -->
    <!-- Start Our CounterUp Area -->
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
    <!-- Start Our Team Area -->
    <section class="htc__team__area ptb--80 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Section Title -->
                    <div class="section__title text-center">
                        <h2 class="title__line">MEET OUR TEAM</h2>
                        <p>We are glad to introduce our professional staff</p>
                    </div>
                    <!-- End Section Title -->
                </div>
            </div>
            <div class="row htc__team__wrap mt--30 xs-mt-0 mb-n6">
                <!-- Start Single Team -->
                <div class="col-xl-4 col-md-6 mb-6">
                    <div class="team">
                        <div class="team__thumb">
                            <a href="#">
                                <img src="images/teacher/1.jpg" alt="team images">
                            </a>
                        </div>
                        <div class="team__details">
                            <div class="team__inner">
                                <h4><a href="profile.html">Sam K. Burns</a></h4>
                                <h6>PROFESSOR</h6>
                            </div>
                            <div class="team__hover__info">
                                <ul class="social__icon__bg--color">
                                    <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank"><i class="icon ion-social-twitter"></i></a></li>
                                    <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank"><i class="icon ion-social-instagram"></i></a></li>
                                    <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="icon ion-social-facebook"></i></a></li>
                                    <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank"><i class="icon ion-social-googleplus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-xl-4 col-md-6 mb-6">
                    <div class="team">
                        <div class="team__thumb">
                            <a href="#">
                                <img src="images/teacher/2.jpg" alt="team images">
                            </a>
                        </div>
                        <div class="team__details">
                            <div class="team__inner">
                                <h4><a href="profile.html">Sam K. Burns</a></h4>
                                <h6>PROFESSOR</h6>
                            </div>
                            <div class="team__hover__info">
                                <ul class="social__icon__bg--color">
                                    <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank"><i class="icon ion-social-twitter"></i></a></li>
                                    <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank"><i class="icon ion-social-instagram"></i></a></li>
                                    <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="icon ion-social-facebook"></i></a></li>
                                    <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank"><i class="icon ion-social-googleplus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-xl-4 col-md-6 mb-6">
                    <div class="team">
                        <div class="team__thumb">
                            <a href="#">
                                <img src="images/teacher/3.jpg" alt="team images">
                            </a>
                        </div>
                        <div class="team__details">
                            <div class="team__inner">
                                <h4><a href="profile.html">Sam K. Burns</a></h4>
                                <h6>PROFESSOR</h6>
                            </div>
                            <div class="team__hover__info">
                                <ul class="social__icon__bg--color">
                                    <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank"><i class="icon ion-social-twitter"></i></a></li>
                                    <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank"><i class="icon ion-social-instagram"></i></a></li>
                                    <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="icon ion-social-facebook"></i></a></li>
                                    <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank"><i class="icon ion-social-googleplus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
        </div>
    </section>
</div>