@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.Registration") }}</h2>
                <p>{{ trans("general.Admission Requirements") }}</p>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul>
                        <li><span class="icon-graduation-cap"></span> Recommendation Form</li>
                        <li><span class="icon-graduation-cap"></span> Legalized copy of your diploma</li>
                        <li><span class="icon-graduation-cap"></span> Legalized copy of your grades</li>
                        <li><span class="icon-graduation-cap"></span> Copy of your ID</li>
                        <li><span class="icon-graduation-cap"></span> Photograph</li>
                        <li><span class="icon-graduation-cap"></span> Certificate of Baptism</li>
                        <li><span class="icon-graduation-cap"></span> Health Certificate</li>
                    </ul>
                    <p><em>{{ trans("general.Please contact us if you need further assistance.") }}</em></p>
                </div>
            </div>

            <div class="row">
                @foreach ($data_study_program_category as $study_program_category)
                    <div class="col-md-4 mb-3">
                        <a draggable="false" href="{{ route("study-program.index") . "?study_program_category={$study_program_category->id}" }}">
                            <img draggable="false" src="{{ $study_program_category->assetImage() }}" class="img-fluid w-100 rounded" alt="{{ trans("general.Studt Program Category") }} - {{ $study_program_category->translate_name }} - {{ env("APP_TITLE") }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
