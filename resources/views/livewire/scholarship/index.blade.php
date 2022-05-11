@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.Scholarship") }}</h2>
                <p>{{ trans("general.Scholarship Admission Requirements") }}</p>
            </div>
            <div class="row justify-content-between">
                <div class="col-12">
                    <p>Harvest International Theological Seminary provides scholarship for prospective students.</p>
                    <p>The scholarship will cover tuition fee and graduation fee. It does not cover living cost and personal expense such as books, assignments, etc.</p>
                    <p>This scholarship will require the students to serve and minister in certain areas appointed by the institution. Studetns will also have 2 years contract after they graduate.</p>
                    <p>If you are interested in applying for this scholarship, please submit your data through think link below</p>
                    <p>
                        <a draggable="false" href="https://hits.ecampuz.com/eadmisi" target="_blank">Application for HITS Scholarship</a>
                    </p>
                    <p><em>{{ trans("general.Please contact us if you need further assistance.") }}</em></p>
                </div>
            </div>
        </div>
    </div>
</div>
