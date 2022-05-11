@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{ trans("general.International Student") }}</h2>
                <p>{{ trans("general.International Student Admission Requirements") }}</p>
            </div>
            <div class="row justify-content-between">
                <div class="col-12">
                    <p>
                        Indonesian Law requires international students to have a valid student visa (KITAS) before studying in Indonesia.<br>
                        You need to prepare the following data in order to process your study permit.
                    </p>
                    <ul>
                        <span>If you are currently outside of Indonesia :</span>
                        <li>1. Recent Photograph</li>
                        <li>2. Copy of Passport</li>
                        <li>3. Copy of Diploma</li>
                        <li>4. Health Certificate</li>
                        <li>5. Financial Statement</li>
                        <li>6. Personal Statement</li>
                        <li>7. Letter of Acceptance from Campus</li>
                        <li>8. Letter of Recommendation from Campus</li>
                        <br>
                        <span>If you are currently in Indonesia, you need to add this following:</span>
                        <li>1. Surat Tanda Melapor (STM)</li>
                        <li>2. Previous KITAS (if any)</li>
                    </ul>
                    <p><em>{{ trans("general.Please contact us if you need further assistance.") }}</em></p>
                </div>
            </div>
        </div>
    </div>
</div>
