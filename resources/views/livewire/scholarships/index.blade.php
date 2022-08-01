@section("name", trans("index." . Str::slug($menu_name, "_")))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("index.Scholarships Scheme") }}</h2>
                        <p>{{ trans("index.Harvest Education Assistance Program") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">{{ trans("index.Harvest Education Assistance (BPH) is given to prospective students who manage to get satisfactory scores in the Harvest STMIK Entrance Examination. For prospective students who have academic achievements in class, they can get the opportunity to deduct the base fee through the achievement path. Scholarships are awarded ranging from 25% to 100%.") }}</p>
                    </div>
                    <div class="about__thumb mt-3">
                        <img draggable="false" class="img-fluid w-100" src="{{ asset("images/scholarship/scholarship.webp") }}" alt="{{ trans("page.Scholarship") }} - 2 - {{ env("APP_TITLE") }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100 bg-light">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("index.Reduction of Base Fee (UB)") }}</h2>
                        <p>{{ trans("index.Selection Path (KUP)") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            1. {{ trans("index.STMIK Harvest Entry Screening Process.") }}<br>
                            2. {{ trans("index.Class Achievement Path: Deductions are awarded based on rank in class during Class X - XII.") }}<br>
                            <br>
                            {{ trans("index.The amount of relief is in the form of deductions from the base fee, based on the table below:") }}
                        </p>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                                <thead>
                                    <tr class="bg-success text-white text-center">
                                        <th>{{ trans("index.Incoming Filter Results") }} <br> / {{ trans("index.Class Achievement") }}</th>
                                        <th>{{ trans("index.Piece Size") }}<br> {{ trans("index.Entry Tuition Fee") }}</th>
                                        <th>{{ trans("index.Entry Tuition Fee") }}<br> {{ trans("index.Paid") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>I</td>
                                        <td>100%</td>
                                        <td>{{ trans("index.FREE") }}</td>
                                    </tr>
                                    <tr>
                                        <td>II</td>
                                        <td>90%</td>
                                        <td>Rp. 1.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>III</td>
                                        <td>80%</td>
                                        <td>Rp. 2.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>IV</td>
                                        <td>70%</td>
                                        <td>Rp. 3.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>V</td>
                                        <td>60%</td>
                                        <td>Rp. 4.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>VI</td>
                                        <td>50%</td>
                                        <td>Rp. 5.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>VII</td>
                                        <td>40%</td>
                                        <td>Rp. 6.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>VIII</td>
                                        <td>30%</td>
                                        <td>Rp. 7.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>IX</td>
                                        <td>20%</td>
                                        <td>Rp. 8.000.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>X</td>
                                        <td>10%</td>
                                        <td>Rp. 9.000.000,-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("index.Tuition Reduction (TR)") }}</h2>
                        <p>{{ trans("index.Selection Path (KUK)") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            {{ trans("index.KUK assistance has one path, namely following the STMIK Harvest Entry Screening Process.") }}<br>
                            {{ trans("index.Deductions are given based on the table below:") }}
                        </p>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                                <thead>
                                    <tr class="bg-success text-white text-center">
                                        <th class="align-middle">{{ trans("index.Incoming Filter Results") }}</th>
                                        <th>{{ trans("index.Piece Size") }}<br> {{ trans("index.Tuition Fee") }}</th>
                                        <th>{{ trans("index.Tuition Fee") }}<br> {{ trans("index.Paid") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>100%</td>
                                        <td>{{ trans("index.FREE") }}</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td>75%</td>
                                        <td>Rp. 1.1750.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td>50%</td>
                                        <td>Rp. 3.500.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <td>25%</td>
                                        <td>Rp. 5.250.000,-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="about__details">
                            {{ trans("index.The amount of relief in the form of tuition deductions, for 2 full semesters which includes:") }}<br>
                            * {{ trans("index.Basic BPP Semester") }}<br>
                            * {{ trans("index.Credits (Package)") }}<br>
                            {{ trans("index.Semester 3 onwards the scholarship will continue if the student succeeds in fulfilling the conditions set by STMIK Harvest.") }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our__about__area bg__white pb--50 pt--30 bg-light">
        <div class="container">
            <div class="row about__wrapper">
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            <strong>{{ trans("index.NOTE") }}:</strong><br>
                            {{ trans("index.If the prospective student gets a 100% scholarship for tuition and fees, then the prospective student is asked to give a sign of joining STMIK Harvest in the amount of Rp. 1,500,000,- as a commitment fee.") }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
