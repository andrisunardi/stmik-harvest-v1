@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Welcome To") }} Yayasan STMIK Harvest</h2>
                        <p>College for Future Technopreneur</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            {!! html_entity_decode($setting->translate_about_us) !!}
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our Vision") }}</h3>
                            {!! html_entity_decode($setting->translate_vision) !!}
                        </p>
                        <p class="about__details">
                            <h3 class="text-uppercase mb-2">{{ trans("general.Our Mission") }}</h3>
                            {!! html_entity_decode($setting->translate_mission) !!}
                        </p>
                    </div>
                </div>
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
                                <a class="htc__btn btn--yellow" href="javascript:;">FIND OUT MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
