@section("title", trans("index.scholarships"))
@section("icon", "fas fa-sack-dollar")
@section("scholarships-active", "active")

<div>
    <section class="our__about__area bg__white pb--80 pt--100">
        <div class="container">
            <div class="row about__wrapper">
                <div class="about">
                    <div class="section__title text-left">
                        <h2 class="title__line">{{ trans("index.scholarships_scheme") }}</h2>
                        <p>{{ trans("index.harvest_education_assistance_program") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            @if (App::isLocale('en'))
                                Harvest Education Assistance (BPH) is given to prospective students who manage to get satisfactory scores in the Harvest STMIK Entrance Examination. For prospective students who have academic achievements in class, they can get the opportunity to deduct the base fee through the achievement path. Scholarships are awarded ranging from 25% to 100%.
                            @else
                                Bantuan Pendidikan Panen (BPH) diberikan kepada calon mahasiswa yang berhasil mendapatkan nilai memuaskan dalam Ujian Masuk STMIK Panen. Bagi calon mahasiswa yang memiliki prestasi akademik di kelas, mereka bisa mendapatkan kesempatan untuk memotong biaya dasar melalui jalur prestasi. Beasiswa diberikan mulai dari 25% hingga 100%.
                            @endif
                        </p>
                    </div>
                    <div class="about__thumb mt-3">
                        <img draggable="false" class="img-fluid w-100" src="{{ asset("images/scholarship/scholarship.webp") }}" alt="{{ trans("index.scholarship") }} - 2 - {{ env("APP_TITLE") }}">
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
                        <h2 class="title__line">{{ trans("index.reduction_of_base_fee_ub") }}</h2>
                        <p>{{ trans("index.selection_path_kup") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            1. {{ trans("index.entry_screening_process") }} {{ env("APP_NAME") }}<br>
                            2. {{ trans("index.class_achievement_path_deductions_are_awarded_based_on_rank_in_class_during_class_x_xii") }}<br>
                            <br>
                            {{ trans("index.the_amount_of_relief_is_in_the_form_of_deductions_from_the_base_fee,_based_on_the_table_below") }}
                        </p>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                                <thead>
                                    <tr class="bg-success text-white text-center">
                                        <th>{{ trans("index.incoming_filter_results") }} <br> / {{ trans("index.class_achievement") }}</th>
                                        <th>{{ trans("index.piece_size") }}<br> {{ trans("index.entry_tuition_fee") }}</th>
                                        <th>{{ trans("index.entry_tuition_fee") }}<br> {{ trans("index.paid") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>I</td>
                                        <td>100%</td>
                                        <td class="text-uppercase">{{ trans("index.free") }}</td>
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
                        <h2 class="title__line">{{ trans("index.tuition_reduction_tr") }}</h2>
                        <p>{{ trans("index.selection_path_kuk") }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about">
                        <p class="about__details">
                            {{ trans("index.kuk_assistance_has_one_path_namely_following_the_entry_screening_process") }}<br>
                            {{ trans("index.deductions_are_given_based_on_the_table_below") }}
                        </p>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle text-center">
                                <thead>
                                    <tr class="bg-success text-white text-center">
                                        <th class="align-middle">{{ trans("index.incoming_filter_results") }}</th>
                                        <th>{{ trans("index.piece_size") }}<br> {{ trans("index.tuition_fee") }}</th>
                                        <th>{{ trans("index.tuition_fee") }}<br> {{ trans("index.paid") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>100%</td>
                                        <td class="text-uppercase">{{ trans("index.free") }}</td>
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
                            {{ trans("index.the_amount_of_relief_in_the_form_of_tuition_deductions_for_2_full_semesters_which_includes") }}<br>
                            * {{ trans("index.basic_bpp_semester") }}<br>
                            * {{ trans("index.credits_package") }}<br>
                            {{ trans("index.semester_3_onwards_the_scholarship_will_continue_if_the_student_succeeds_in_fulfilling_the_conditions_set_by") }}
                            {{ env("APP_NAME") }}
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
                            <strong class="text-uppercase">{{ trans("index.note") }}:</strong><br>
                            @if (App::isLocale('en'))
                                If the prospective student gets a 100% scholarship for tuition and fees, then the prospective student is asked to give a sign of joining STMIK Harvest in the amount of Rp. 1,500,000,- as a commitment fee.
                            @else
                                Jika calon mahasiswa mendapatkan beasiswa 100% untuk biaya kuliah dan biaya, maka calon mahasiswa tersebut diminta untuk memberikan tanda bergabung dengan STMIK Harvest sebesar Rp. 1.500.000,- sebagai biaya komitmen.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
