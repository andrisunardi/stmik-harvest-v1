@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="filters_listing sticky_horizontal">
        <div class="container">
            {{-- <ul class="clearfix">
                <li>
                    <div class="switch-field">
                        <input type="radio" id="all" name="listing_filter" value="all" checked>
                        <label for="all">All</label>
                        <input type="radio" id="popular" name="listing_filter" value="popular">
                        <label for="popular">Popular</label>
                        <input type="radio" id="latest" name="listing_filter" value="latest">
                        <label for="latest">Latest</label>
                    </div>
                </li>
                <li>
                    <div class="layout_view">
                        <a draggable="false" href="javascript:;" class="active"><i class="icon-th"></i></a>
                        <a draggable="false" href="javascript:;"><i class="icon-th-list"></i></a>
                    </div>
                </li>
                <li>
                    <select wire:model="study_program_category" id="study_program_category" name="study_program_category" class="selectbox">
                        <option value="">{{ trans("general.All") }}</option>
                        @foreach ($data_study_program_category as $study_program_category)
                            <option value="{{ $study_program_category->id }}">{{ $study_program_category->code }}</option>
                        @endforeach
                    </select>
                </li>
            </ul> --}}
        </div>
    </div>

    <div class="container margin_60_35">
        <div class="row">
            @foreach ($data_study_program as $study_program)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="box_grid wow">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            {{-- <a draggable="false" href="javascript:;" class="wish_bt"></a> --}}
                            <a draggable="false" href="{{ route("{$menu_slug}.view", ["study_program_slug" => $study_program->slug]) }}">
                                <img draggable="false" src="{{ $study_program->assetImage() }}" class="img-fluid w-100" alt="{{ trans("page.{$menu_name}") }} - {{ $study_program->translate_name }} - {{ env("APP_TITLE") }}">
                            </a>
                            <div class="price">{{ $study_program->degree }}</div>
                            <div class="preview"><span>{{ trans("general.View Detail") }}</span></div>
                        </figure>
                        <div class="wrapper">
                            <small>{{ $study_program->study_program_category?->name }}</small>
                            <h3>{{ $study_program->translate_name }}</h3>
                            <p>{{ strip_tags(Str::limit($study_program->translate_description, 200)) }}</p>
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
                            <li><i class="icon-graduation-cap"></i> {{ trans("general.Degree") }} : {{ $study_program->degree }}</li>
                            <li><a draggable="false" href="{{ route("{$menu_slug}.view", ["study_program_slug" => $study_program->slug]) }}">{{ trans("button.View Detail") }}</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($study_program_category)
            <p class="text-center">
                <a draggable="false" href="{{ route("{$menu_slug}.index") }}" class="btn_1 rounded add_top_30">{{ trans("button.Back") }}</a>
            </p>
        @endif
    </div>

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-4">
                    <a draggable="false" href="{{ route("contact-us.index") }}" class="boxed_list">
                        <i class="pe-7s-call"></i>
                    <h4>{{ trans("general.Need Help? Contact Us") }}</h4>
                        <p>{{ trans("general.Please contact us if you need further assistance.") }}</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a draggable="false" href="{{ route("about.index") }}" class="boxed_list">
                        <i class="pe-7s-display2"></i>
                        <h4>{{ trans("general.About HITS") }}</h4>
                        <p>{{ trans("general.Know About Us") }}</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a draggable="false" href="https://hits.ecampuz.com/eadmisi" target="_blank" class="boxed_list">
                        <i class="pe-7s-note2"></i>
                        <h4>{{ trans("general.Registration") }}</h4>
                        <p>{{ trans("general.Click To Know About Registration") }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
