@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <main>
        <div id="full-slider-wrapper">
            <div id="layerslider" class="w-100 vh-100-delete" style="height:770px">
                @foreach ($data_slider as $slider)
                    <div class="ls-slide" data-ls="slidedelay:5000; transition2d:85;">
                        <img draggable="false" src="{{ $slider->assetImage() }}" class="ls-bg img-fluid" alt="Slide background">
                        <h3 class="ls-l slide_typo" style="top: 47%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
                            {{ $slider->translate_name }}
                        </h3>
                        <p class="ls-l slide_typo_2" style="top:55%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
                            {!! html_entity_decode($slider->translate_description) !!}
                        </p>
                        <a class="ls-l btn_1 rounded" style="top:65%; left:50%;white-space: nowrap;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href="{{ $slider->button_link }}">{{ $slider->translate_button_name }}</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="features clearfix">
            <div class="container">
                <ul>
                    {{-- <li>
                        <i class="pe-7s-study"></i>
                        <h4>{{ trans("general.Be Part Of Us") }}</h4>
                        <span>{{ trans("general.Join us and learn from the best people.") }}</span>
                    </li> --}}
                    <li>
                        <i class="pe-7s-world"></i>
                        <h4>{{ trans("general.International Curriculum") }}</h4>
                        <span>{{ trans("general.Partnering with Christian Universities overseas to create the most advanced international curriculum.") }}</span>
                    </li>
                    <li>
                        <i class="pe-7s-id"></i>
                        <h4>{{ trans("general.Professional Lecturers") }}</h4>
                        <span>{{ trans("general.Our lecturers are highly professional and top leaders in their ministry, churches, business, etc.") }}</span>
                    </li>
                    <li>
                        <i class="pe-7s-users"></i>
                        <h4>{{ trans("general.Living Witness") }}</h4>
                        <span>{{ trans("general.Our alumni has becoming top Christian musicians, leaders, or pastors in their churches.") }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-fluid margin_120_0">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.Lecturer") }}</h2>
                <p>{{ trans("general.Meet Our Professional Lecturers") }}</p>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">
                @foreach ($data_lecturer as $lecturer)
                    <div class="item">
                        <div class="box_grid">
                            <figure>
                                @if ($lecturer->instagram)
                                    <a draggable="false" href="{{ $lecturer->instagram }}" target="_blank" class="wish_bt"></a>
                                @endif
                                <a draggable="false" href="{{ route("lecturer.view", ["lecturer_slug" => $lecturer->slug]) }}">
                                    <div class="preview"><span>{{ trans("general.View Detail") }}</span></div>
                                    <img draggable="false" class="img-fluid w-100"
                                        src="{{ $lecturer->assetImage() }}"
                                        alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}">
                                </a>
                                {{-- <div class="price">$39</div> --}}
                            </figure>
                            <div class="wrapper">
                                <small>{{ $lecturer->job }}</small>
                                <h3>{{ $lecturer->name }}</h3>
                                <p>{{ strip_tags(Str::limit($lecturer->description, 200)) }}</p>
                                {{-- <div class="rating">
                                    <i class="icon_star voted"></i>
                                    <i class="icon_star voted"></i>
                                    <i class="icon_star voted"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <small>(145)</small>
                                </div> --}}
                            </div>
                            <ul>
                                {{-- <li><i class="icon_clock_alt"></i> 1h 30min</li> --}}
                                {{-- <li><i class="icon_like"></i> 890</li> --}}
                                <li><i class="icon-suitcase"></i> {{ trans("general.HITS Lecturer") }}</li>
                                <li><a draggable="false" href="{{ route("lecturer.view", ["lecturer_slug" => $lecturer->slug]) }}">{{ trans("button.View Detail") }}</a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container">
                <p class="btn_home_align">
                    <a draggable="false" href="{{ route("lecturer.index") }}" class="btn_1 rounded">
                        {{ trans("button.View") }} {{ trans("page.Lecturer") }}
                    </a>
                </p>
            </div>
            <hr>
        </div>

        <div class="container margin_30_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.Study Program") }}</h2>
                <p>{{ trans("general.Get Know Our Study Program") }}</p>
            </div>
            <div class="row justify-content-center">
                @foreach ($data_study_program as $study_program)
                    <div class="col-md-4 wow" data-wow-offset="150">
                        <a draggable="false" href="{{ route("study-program.view", ["study_program_slug" => $study_program->slug]) }}" class="grid_item">
                            <figure class="block-reveal">
                                <div class="block-horizzontal"></div>
                                <img draggable="false" src="{{ $study_program->assetImage() }}" class="img-fluid w-100" alt="">
                                <div class="info">
                                    <small>
                                        <i class="ti-layers"></i>
                                        {{ $study_program->data_course->count() }}
                                        {{ trans("general.Course") }}
                                    </small>
                                    <h3>{{ $study_program->translate_name }}</h3>
                                </div>
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg_color_1">
            <div class="container margin_120_95">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>{{ trans("general.Latest News and Events") }}</h2>
                    <p>{{ trans("general.Join Our Events And Read Our News") }}</p>
                </div>
                <div class="row">
                    @foreach ($data_news as $news)
                        <div class="col-lg-6">
                            <a class="box_news" href="{{ route("news.view", ["news_slug" => $news->slug]) }}">
                                <figure>
                                    <img draggable="false" src="{{ $news->assetImage() }}" class="img-fluid w-100"
                                        alt="{{ trans("general.News") }} - {{ $news->translate_name }} - {{ env("APP_TITLE") }}">
                                    <figcaption>
                                        <strong>{{ Date::parse($news->date)->format("d") }}</strong>
                                        {{ Date::parse($news->date)->format("M") }}
                                    </figcaption>
                                </figure>
                                <ul>
                                    <li>Administrator</li>
                                    <li>{{ Date::parse($news->date)->format("d F Y") }}</li>
                                </ul>
                                <h4>{{ $news->translate_name }}</h4>
                                <p>{{ strip_tags(Str::limit($news->translate_description, 100)) }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <p class="btn_home_align">
                    <a draggable="false" href="{{ route("news.index") }}" class="btn_1 rounded">
                        {{ trans("general.View all news and events") }}
                    </a>
                </p>
            </div>
        </div>

        <section class="hero_single version_2" style="background: url({{ asset("images/journal.jpg") }}) center center no-repeat fixed; background-size: 100% 100%">
            <div class="wrapper">
                <div class="container">
                    <h3>{{ trans("general.Search Repository") }}</h3>
                    <p>{{ trans("general.You can search all HITS's Repository here.") }}</p>
                    <form class="was-validated-delete" method="get" role="form" action="{{ route("repository.index") }}">
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="search" class="search-query" id="title" name="title" placeholder="{{ trans("general.Enter your keyword here...") }}" required>
                                <input type="submit" class="btn_search" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <ul id="grid_home" class="clearfix">
            <li>
                <a draggable="false" href="https://www.facebook.com/{{ env("SOCIAL_MEDIA_FACEBOOK") }}" target="_blank" class="img_container">
                    {{-- <img draggable="false" src="{{ asset("images/slider/welcome-to.png") }}" alt=""> --}}
                    <div class="short_info">
                        <span class="ti-facebook h2 mb-4"></span>
                        <h3 class="mb-5"><strong>Facebook</strong>Harvest International Theological Seminary</h3>
                        <div><span class="btn_1 rounded">{{ trans("button.View") }}</span></div>
                    </div>
                </a>
            </li>
            <li>
                <a draggable="false" href="https://www.instagram.com/{{ env("SOCIAL_MEDIA_INSTAGRAM") }}" target="_blank" class="img_container">
                    {{-- <img draggable="false" src="{{ asset("images/slider/the-best-education.png") }}" alt=""> --}}
                    <div class="short_info">
                        <span class="ti-instagram h2 mb-4"></span>
                        <h3 class="mb-5"><strong>Instagram</strong>STT International Harvest</h3>
                        <div><span class="btn_1 rounded">{{ trans("button.View") }}</span></div>
                    </div>
                </a>
            </li>
            <li>
                <a draggable="false" href="https://www.youtube.com/{{ env("SOCIAL_MEDIA_YOUTUBE") }}" target="_blank" class="img_container">
                    {{-- <img draggable="false" src="{{ asset("images/slider/high-quality-lecturers.png") }}" alt=""> --}}
                    <div class="short_info">
                        <span class="ti-youtube h2 mb-4"></span>
                        <h3 class="mb-5"><strong>Youtube</strong>STT Internasional Harvest - HITS Jakarta</h3>
                        <div><span class="btn_1 rounded">{{ trans("button.View") }}</span></div>
                    </div>
                </a>
            </li>
        </ul>

        {{-- <div class="call_section">
            <div class="container clearfix">
                <div class="col-lg-5 col-md-6 float-right wow position-relative" data-wow-offset="250">
                    <div class="block-reveal">
                        <div class="block-vertical"></div>
                        <div class="box_1">
                            <h3>Enjoy a great students community</h3>
                            <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
                            <a href="#0" class="btn_1 rounded">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </main>
</div>
