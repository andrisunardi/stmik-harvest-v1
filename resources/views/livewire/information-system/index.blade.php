@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("general.Introduction") }}</h2>
                        <p>{{ trans("general.Undergraduate For Information System Programme") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">{{ trans("general.Information systems become an absolute necessity in an organization. This triggers the need for graduates from the Information Systems major to work in the world of work. STMIK Harvest (formerly STMIK Kuwera) began to specialize in creating graduates who are ready to work in any industry. By continuing to look at technological trends, industry needs and also updating learning methods, STMIK Harvest presents a curriculum that is believed to be competitive and can be applied directly in the world of work to prepare students to be ready to become technopreneurs or entrepreneurs in the field of technology.") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80 bg-light">
        <div class="container">
            <div class="about">
                <div class="section__title text-center">
                    <h2 class="title__line">{{ trans("general.Information System Specialization") }}</h2>
                    <p>{{ trans("general.Undergraduate For Information System Programme") }}</p>
                </div>
            </div>

            <div class="row htc__service__wrap mt-5">

                <div class="col-md-6">
                    <div class="service text-center">
                        <div class="service__icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("general.Business Information System") }}</a></h2>
                            <p>{{ trans("general.Focus on knowledge of business development & information system development. prepared to become entrepreneurs in the field of technology. (technopreneur)") }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="service text-center service__color--1">
                        <div class="service__icon">
                            <i class="fas fa-line-chart"></i>
                        </div>
                        <div class="service__details">
                            <h2><a draggable="false" href="javascript:;">{{ trans("general.Information System Specialist") }}</a></h2>
                            <p>{{ trans("general.Focus on developing mobile and web-based Information Systems to become experts in the design, development, integration and implementation of a system.") }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="htc__service__area bg__white ptb--80 bg-light">
        <div class="container">
            <div class="about">

                <div class="about__thumb mt-3 mb-3 mb-lg-auto">
                    <img draggable="false" class="img-fluid rounded w-100" src="{{ asset("images/programme/information-system-1.webp") }}" alt="{{ trans("page.Information System") }} - 1 - {{ env("APP_TITLE") }}">
                </div>

                <div class="about__thumb mt-3 mb-3 mb-lg-auto">
                    <img draggable="false" class="img-fluid rounded w-100" src="{{ asset("images/programme/information-system-2.webp") }}" alt="{{ trans("page.Information System") }} - 2 - {{ env("APP_TITLE") }}">
                </div>

            </div>
        </div>
    </section>
</div>
