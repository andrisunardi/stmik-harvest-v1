@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title text-center">
                        <h2 class="title__line">{{ trans("page.Our Network") }}</h2>
                        <p>
                            {{ trans("index.STMIK HARVEST cooperates with several universities abroad.") }}<br>
                            {{ trans("index.Some of the cooperation agendas include lecturer and curriculum development programs, as well as student exchange programs.") }}
                            {{-- STMIK HARVEST bekerjasama dengan beberapa perguruan tinggi di luar negeri.<br>
                            Beberapa agenda kerjasama antara lain program pengembangan dosen dan kurikulum, serta program pertukaran mahasiswa. --}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="shop__content__wrap">
                        <div role="tabpanel" class="single__shop__view clearfix tab-pane fade show active" id="shop-view">
                            <div class="row">
                                @foreach ($data_network as $network)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="shop">
                                            <div class="shop__thumb">
                                                <a draggable="false" href="{{ $network->link }}" target="_blank">
                                                    <img draggable="false" src="{{ $network->assetImage() }}" class="img-fluid img-thumbnail rounded w-100" alt="{{ trans("page.Our Network") }} - {{ $network->name }} - {{ env("APP_TITLE") }}">
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
