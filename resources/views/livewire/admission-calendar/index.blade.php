@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="section__title text-center">
                <h2 class="title__line">{{ trans("index.List of Scheduled Waves Registration Is Open") }}</h2>
                <p>{{ trans("index.Don't miss the registration, here's an important schedule you can take note of") }}</p>
            </div>
            <div class="accordion mt-5" id="accordion-admission-calendar">
                @foreach ($data_admission_calendar as $admission_calendar)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button {{ $loop->first ? null : "collapsed" }}" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-{{ $loop->iteration }}" aria-expanded="{{ $loop->first ? "true" : "false" }}" aria-controls="panelsStayOpen-collapse-{{ $loop->iteration }}">{{ $admission_calendar->translate_name }}</button>
                        </h2>
                        <div id="panelsStayOpen-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first ? "show" : null }}" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">{!! html_entity_decode($admission_calendar->translate_description) !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="htc__findout__area bg__cat--3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="findout__wrap my-5 my-sm-auto">
                        <div class="findout__inner">
                            <h2>
                                <span>{{ trans("index.Ready to Join ?") }}</span>
                                {{ trans("index.It easy now to you for being our part, just click the button below and fill out the form with your data.") }}
                            </h2>
                            <div class="findout__btn">
                                {{-- <a draggable="false" class="htc__btn btn--yellow" href="{{ route("online-registration.index") }}">{{ trans("index.Register") }}</a> --}}
                                <a draggable="false" class="htc__btn btn--yellow" href="https://pmb.stmik-kuwera.civitas.id" target="_blank">{{ trans("index.Register") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
