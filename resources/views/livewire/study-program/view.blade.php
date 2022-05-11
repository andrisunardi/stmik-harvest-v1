@section("name", $study_program->translate_name)
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a draggable="false" href="#about" class="active">{{ trans("general.About") }}</a></li>
                    <li><a draggable="false" href="#vision">{{ trans("general.Vision") }}</a></li>
                    <li><a draggable="false" href="#mission">{{ trans("general.Mission") }}</a></li>
                    <li><a draggable="false" href="#degree">{{ trans("general.Degree") }}</a></li>
                    <li><a draggable="false" href="#course">{{ trans("general.Course") }}</a></li>
                    <li><a draggable="false" href="#lecturer">{{ trans("general.Lecturer") }}</a></li>
                </ul>
            </div>
        </nav>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box_highlight">
                        <ul class="additional_info">
                            <li><i class="pe-7s-timer"></i> {{ trans("general.Study Program Duration") }}<strong>{{ $study_program->duration }} {{ trans("general.Semester") }}</strong></li>
                            <li><i class="pe-7s-medal"></i> {{ trans("general.Degree") }}<strong>{{ $study_program->degree }}</strong></li>
                            <li><i class="pe-7s-wallet"></i> {{ trans("general.Tuition Fee") }}<strong>{{ $study_program->price ?? trans("page.Contact Us") }}</strong></li>
                        </ul>
                    </div>

                    <section id="about">
                        <h2>{{ trans("general.About") }} {{ $study_program->translate_name }}</h2>
                        <p>{!! html_entity_decode($study_program->translate_description) !!}</p>
                    </section>

                    <hr>

                    <section id="vision">
                        <h2>{{ trans("general.Vision") }} {{ $study_program->translate_name }}</h2>
                        <p>{!! html_entity_decode($study_program->translate_vision) !!}</p>
                    </section>

                    <hr>

                    <section id="mission">
                        <h2>{{ trans("general.Mission") }} {{ $study_program->translate_name }}</h2>
                        <p>{!! html_entity_decode($study_program->translate_mission) !!}</p>
                    </section>

                    <hr>

                    <section id="degree">
                        <h2>{{ trans("general.Degree") }} {{ $study_program->translate_name }}</h2>
                        <p>{!! html_entity_decode($study_program->degree) !!}</p>
                    </section>

                    <hr>

                    <section id="course">
                        <div class="intro_title">
                            <h2>{{ trans("general.Course") }}</h2>
                            <ul>
                                <li>{{ $study_program->total_course() }} {{ trans("general.SKS") }}</li>
                            </ul>
                        </div>
                        <div id="accordion_lessons" role="tablist" class="add_bottom_45">
                            @for ($year = 1; $year <= (round($study_program->duration / 2)); $year++)
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading-{{ $year }}">
                                        <h5 class="mb-0">
                                            <a draggable="false" data-bs-toggle="collapse" href="#collapse-{{ $year }}" aria-expanded="{{ $year == 1 ? "true" : "false" }}" aria-controls="collapse-{{ $year }}"><i class="indicator ti-minus"></i> {{ trans("datetime.Year") }} {{ $year }}</a>
                                        </h5>
                                    </div>

                                    <div id="collapse-{{ $year }}" class="collapse {{ $year == 1 ? "show" : null }}" role="tabpanel" aria-labelledby="heading-{{ $year }}">
                                        <div class="card-body">
                                            <p>{{ trans("general.List Course For Year") }} {{ $year }}</p>
                                            <h6>{{ trans("general.Semester") }} {{ ($year * 2) - 1 }} / {{ trans("general." . Str::oddEven(($year * 2) - 1 )) }}</h6>
                                            <div class="list_lessons_2">
                                                <ul>
                                                    @foreach ($study_program->data_course->where("semester", ($year * 2) - 1) as $course)
                                                        <li>
                                                            {{ $loop->iteration }}. {{ $course->code }} - {{ $course->name }}
                                                            <span>{{ $course->sks }} SKS</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @if ($study_program->data_course->where("semester", $year * 2)->count())
                                                <h6>{{ trans("general.Semester") }} {{ $year * 2 }} / {{ trans("general." . Str::oddEven($year * 2)) }}</h6>
                                                <div class="list_lessons_2">
                                                    <ul>
                                                        @foreach ($study_program->data_course->where("semester", $year * 2) as $course)
                                                            <li>
                                                                {{ $loop->iteration }}. {{ $course->code }} - {{ $course->name }}
                                                                <span>{{ $course->sks }} SKS</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @else
                                                @if ($study_program->data_course->where("semester", 0)->count())
                                                    <h6>{{ trans("general.Matriculation") }}</h6>
                                                    <div class="list_lessons_2">
                                                        <ul>
                                                            @foreach ($study_program->data_course->where("semester", 0) as $course)
                                                                <li>
                                                                    {{ $loop->iteration }}. {{ $course->code }} - {{ $course->name }}
                                                                    <span>{{ $course->sks }} {{ trans("general.SKS") }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </section>

                    <hr>

                    <section id="lecturer">
                        <div class="intro_title">
                            <h2>{{ trans("general.Lecturer") }}</h2>
                        </div>
                        <p>{{ trans("general.List of lecturers who will teach in this study program.") }}</p>
                        <div class="row add_top_20 add_bottom_30">
                            @foreach ($study_program->data_course_lecturer as $course_lecturer)
                                <div class="col-lg-6">
                                    <ul class="list_teachers">
                                        <li>
                                            <a draggable="false" href="{{ route("lecturer.view", ["lecturer_slug" => $course_lecturer->lecturer?->slug]) }}">
                                                <figure>
                                                    <img draggable="false" class="img-fluid w-100"
                                                        src="{{ $course_lecturer->lecturer?->assetImage() }}"
                                                        alt="{{ trans("page.Lecturer") }} - {{ $course_lecturer->lecturer?->name }} - {{ env("APP_TITLE") }}">
                                                </figure>
                                                <h5>{{ $course_lecturer->lecturer?->name }}</h5>
                                                <p>{{ $course_lecturer->lecturer?->job }}</p>
                                                <i class="pe-7s-angle-right-circle"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <a draggable="false" href="{{ route("{$menu_slug}.index") }}" class="btn_1 rounded add_top_30 add_bottom_30">{{ trans("button.Back") }}</a>
                </div>

                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail">
                        <figure>
                            <a draggable="false" href="{{ $study_program->assetImage() }}" target="_blank" class="video-delete">
                                <i class="icon-zoom-in"></i>
                                <img draggable="false" class="img-fluid w-100" src="{{ $study_program->assetImage() }}" alt="{{ trans("page.{$menu_name}") }} - {{ $study_program->translate_name }} - {{ env("APP_TITLE") }}">
                                {{-- <span>{{ trans("general.Registration") }}</span> --}}
                            </a>
                        </figure>
                        <div class="price">
                            {{ $study_program->translate_name }}
                            <span class="original_price">{{ $study_program->degree }}</span>
                        </div>
                        <a draggable="false" href="https://hits.ecampuz.com/eadmisi" class="btn_1 full-width">{{ trans("general.Register Now") }}</a>
                        <a draggable="false" href="{{ route("contact-us.index") }}" class="btn_1 full-width outline"><i class="icon-call"></i> {{ trans("page.Contact Us") }}</a>
                        <div id="list_feat">
                            <h3>{{ trans("general.Other Study Program") }}</h3>
                            <ul>
                                @foreach ($data_other_study_program as $other_study_program)
                                    <li>
                                        <a draggable="false" href="{{ route("{$menu_slug}.view", ["study_program_slug" => $other_study_program->slug]) }}">
                                            <i class="icon-graduation-cap"></i> {{ $other_study_program->translate_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
