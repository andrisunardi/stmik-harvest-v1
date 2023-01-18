@section("title", trans("index.our_network"))
@section("icon", "fas fa-sitemap")
@section("our-network-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">{{ trans("index.our_network") }}</h2>
                        <p>
                            {{ env("APP_NAME") }} {{ trans("index.cooperates_with_several_universities_abroad") }}<br>
                            {{ trans("index.some_of_the_cooperation_agendas_include_lecturer_and_curriculum_development_programs_as_well_as_student_exchange_programs") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="shop__content__wrap">
                        <div role="tabpanel" class="single__shop__view clearfix tab-pane fade show active" id="shop-view">
                            <div class="row">
                                @foreach ($networks as $network)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="shop">
                                            <div class="shop__thumb">
                                                <a draggable="false" href="{{ $network->link }}" target="_blank">
                                                    <img draggable="false" src="{{ $network->assetImage() }}" class="img-fluid img-thumbnail rounded w-100" alt="{{ $network->altImage() }}">
                                                </a>
                                            </div>
                                            <div class="shop__details">
                                                <h2><a draggable="false" href="{{ $network->link }}" target="_blank">{{ $network->name }}</a></h2>
                                                <span class="product__price">{!! html_entity_decode($network->description) !!}</span>
                                                <div class="shop__btn">
                                                    <a class="htc__btn btn--transparent" href="{{ $network->link }}" target="_blank">
                                                        <i class="icon ion-link"></i>
                                                        <span class="text-lowercase">{{ Str::replace(["https://", "http://"], "", $network->link) }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
