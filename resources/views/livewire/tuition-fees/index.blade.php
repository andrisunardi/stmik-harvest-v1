@section("title", trans("index.tuition_fees"))
@section("icon", "fas fa-money")
@section("tuition-fees-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="section__title text-center">
                <h2 class="title__line">{{ trans("index.tuition_fee") }}</h2>
                <p>
                    {{ trans("index.the_following_is_the_cost_of_education_at") }}
                    {{ env("APP_NAME") }}
                </p>
            </div>
            <div class="accordion mt-5" id="accordion-tuition-fee">
                @foreach ($tuitionFees as $tuitionFee)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button {{ $loop->first ? null : "collapsed" }}" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-{{ $loop->iteration }}" aria-expanded="{{ $loop->first ? "true" : "false" }}" aria-controls="panelsStayOpen-collapse-{{ $loop->iteration }}">{{ $tuitionFee->translate_name }}</button>
                        </h2>
                        <div id="panelsStayOpen-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first ? "show" : null }}" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">{!! html_entity_decode($tuitionFee->translate_description) !!}</div>
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
                                <span class="text-nowrap me-md-2">{{ trans("index.ready_to_join") }} ?</span>
                                {{ trans("custom.it_easy_now_to_you_for_being_our_part_just_click_the_button_below_and_fill_out_the_form_with_your_data") }}
                            </h2>
                            <div class="findout__btn">
                                {{-- <a draggable="false" class="htc__btn btn--yellow" href="{{ route("online-registration.index") }}">{{ trans("index.Register") }}</a> --}}
                                <a draggable="false" class="htc__btn btn--yellow" href="{{ Str::setting("link_registration") }}" target="_blank">{{ trans("index.register") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
