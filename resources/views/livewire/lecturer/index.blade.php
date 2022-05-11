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
                <li></li>
                    <div class="layout_view">
                        <a href="#0" class="active"><i class="icon-th"></i></a>
                        <a href="courses-list.html"><i class="icon-th-list"></i></a>
                    </div>
                </li>
                <li>
                    <select name="orderby" class="selectbox" style="width:500px">
                        <option value="">{{ trans("general.Category") }}</option>
                        @foreach ($data_lecturer_category as $lecturer_program)
                            <option value="{{ $lecturer_program->job }}">{{ $lecturer_program->job }}</option>
                        @endforeach
                    </select>
                </li>
            </ul> --}}
        </div>
    </div>

    <div class="container margin_60_35">

        @include("layouts.alert")

        <div class="row">
            @foreach ($data_lecturer as $lecturer)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="box_grid wow">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            @if ($lecturer->instagram)
                                <a draggable="false" href="{{ $lecturer->instagram }}" target="_blank" class="wish_bt"></a>
                            @endif
                            <a draggable="false" href="{{ route("{$menu_slug}.view", ["lecturer_slug" => $lecturer->slug]) }}">
                                <img draggable="false" class="img-fluid w-100"
                                    src="{{ $lecturer->assetImage() }}"
                                    alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}">
                            </a>
                            {{-- <div class="price">$54</div> --}}
                            <div class="preview"><span>{{ trans("general.View Detail") }}</span></div>
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
                            <li><a draggable="false" href="{{ route("{$menu_slug}.view", ["lecturer_slug" => $lecturer->slug]) }}">{{ trans("button.View Detail") }}</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <nav class="text-center">
            <ul class="pagination pagination-sm">
                <li class="page-item disabled">
                    <a draggable="false" class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a draggable="false" class="page-link" href="#">1</a></li>
                <li class="page-item"><a draggable="false" class="page-link" href="#">2</a></li>
                <li class="page-item"><a draggable="false" class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a draggable="false" class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> --}}

        {{-- <p class="text-center"><a draggable="false" href="#0" class="btn_1 rounded add_top_30">Load more</a></p> --}}
    </nav>
</div>
