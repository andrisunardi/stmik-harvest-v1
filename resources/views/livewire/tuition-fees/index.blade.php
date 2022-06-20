@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="section__title text-center">
                <h2 class="title__line">{{ trans("page.Tuition Fee") }}</h2>
                <p>{{ trans("index.The following is the cost of education at STMIK Harvest") }}</p>
            </div>
            <div class="accordion mt-5" id="accordion-tuition-fee">
                @foreach ($data_tuition_fee as $tuition_fee)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button {{ $loop->first ? null : "collapsed" }}" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-{{ $loop->iteration }}" aria-expanded="{{ $loop->first ? "true" : "false" }}" aria-controls="panelsStayOpen-collapse-{{ $loop->iteration }}">{{ $tuition_fee->translate_name }}</button>
                        </h2>
                        <div id="panelsStayOpen-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first ? "show" : null }}" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">{!! html_entity_decode($tuition_fee->translate_description) !!}</div>
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
                                {{ trans("index.Become our student with an easy steps, click the button below") }}
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
