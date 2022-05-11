@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="container margin_30_95">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>{{ trans("general.Read Our Magazine") }}</h2>
            <p>{{ trans("general.Download Our Magazine To Know Us") }}</p>
        </div>
        <div class="row">
            @foreach ($data_magazine as $magazine)
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a draggable="false" href="{{ $magazine->assetFile() }}" class="grid_item" target="_blank">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img draggable="false" src="{{ $magazine->assetImage() }}" class="img-fluid" alt="{{ trans("general.Magazine") }} - {{ $magazine->translate_name }} - {{ env("APP_TITLE") }}">
                            <div class="info">
                                {{-- <small><i class="ti-layers"></i> 1 {{ $magazine->translate_name }}</small> --}}
                                <h3>{{ $magazine->translate_name }}</h3>
                                <p>{{ strip_tags(Str::limit($magazine->translate_description, 100)) }}</p>
                            </div>
                        </figure>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
