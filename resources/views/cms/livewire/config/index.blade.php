@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

@push("meta")
@endpush

@push("css")
@endpush

@push("script")
@endpush

<div>
    <div class="page-content-wrapper py-3" id="elementsSearchList">
        <div class="container-fluid">

            <div class="breadcrumb-wrapper breadcrumb-one mb-3 rounded">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 px-1 py-4">
                            <li class="breadcrumb-item"><a draggable="false" href="{{ route("{$sub_domain}.index") }}"><i class="bi bi-house-door me-1"></i> {{ trans("index.home") }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="@yield("icon") me-1"></i> @yield("name")</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @include("{$sub_domain}.layouts.alert")

            <div class="card">
                <div class="card-header bg-primary text-white">
                    @yield("name")
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <h6>{{ trans("index.Server Time") }}</p>
                        </div>
                        <div class="col-7 col-sm-6 col-md-8 col-lg-9 col-xl-10 text-end text-sm-start">
                            <p id="clock"></p>
                        </div>
                    </div>

                    <h6>{{ trans("index.Change Language") }}</h6>
                    <div class="language-area-wrapper">
                        <ul class="ps-0 language-lists">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="language" id="English"
                                        wire:click="changeLanguage('en')" {{ Session::get("locale") == "en" ? "checked" : null }}>
                                    <label class="form-check-label" for="English">{{ trans("index.English") }}</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="language" id="indonesia"
                                        wire:click="changeLanguage('id')" {{ Session::get("locale") == "id" ? "checked" : null }}>
                                    <label class="form-check-label" for="indonesia">{{ trans("index.Indonesia") }}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-footer bg-primary">
                </div>
            </div>
        </div>
    </div>
</div>
