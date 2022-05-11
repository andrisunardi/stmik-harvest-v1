@section("name", $lecturer->name)
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div class="profile">
                    <figure>
                        <img draggable="false" class="rounded-circle img-fluid w-100"
                            src="{{ $lecturer->assetImage() }}"
                            alt="{{ trans("page.{$menu_name}") }} - {{ $lecturer->name }} - {{ env("APP_TITLE") }}">
                    </figure>

                    <ul class="social_teacher">
                        <li><a draggable="false" href="{{ $lecturer->facebook }}" target="_blank"><i class="icon-facebook"></i></a></li>
                        {{-- <li><a draggable="false" href="{{ $lecturer->twitter }}" target="_blank"><i class="icon-twitter"></i></a></li> --}}
                        <li><a draggable="false" href="{{ $lecturer->instagram }}" target="_blank"><i class="icon-instagram"></i></a></li>
                        {{-- <li><a draggable="false" href="{{ $lecturer->linkedin }}" target="_blank"><i class="icon-linkedin"></i></a></li> --}}
                    </ul>

                    <ul>
                        <li>{{ trans("general.Name") }} <span class="float-right">{{ $lecturer->name }}</span> </li>
                        <li>{{ trans("general.Job") }} <span class="float-right">{{ $lecturer->job }}</span></li>
                        {{-- <li>{{ trans("general.Email") }} <span class="float-right"><a draggable="false" href="mailto:{{ $lecturer->email }}">{{ $lecturer->email }}</a></span></li> --}}
                        {{-- <li>{{ trans("general.Phone") }} <span class="float-right"><a draggable="false" href="tel:+{{ Str::phone($lecturer->phone) }}">{{ $lecturer->phone }}</a></span></li> --}}
                        <li>{{ trans("general.Courses") }} <span class="float-right">{{ $lecturer->data_course_lecturer->count() }}</span></li>
                    </ul>
                </div>
            </aside>

            <div class="col-lg-9">
                <div class="box_teacher">
                    <div class="indent_title_in">
                        <i class="pe-7s-user"></i>
                        <h3>{{ trans("general.Profile") }}</h3>
                        <p>{{ $lecturer->name }}</p>
                    </div>
                    <div class="wrapper_indent">
                        <p>{!! html_entity_decode($lecturer->description) !!}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>{{ trans("general.Education") }}</h6>
                                <ul class="list_3">
                                    @foreach ($data_lecturer_education as $lecturer_education)
                                        <li>
                                            <strong>{{ $lecturer_education->translate_name }}</strong>
                                            <p>{{ $lecturer_education->translate_description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <h6>{{ trans("general.Work Experience") }}</h6>
                                <ul class="list_3">
                                    @foreach ($data_lecturer_work_experience as $lecturer_work_experience)
                                        <li>
                                            <strong>{{ $lecturer_work_experience->translate_name }}</strong>
                                            <p>{{ $lecturer_work_experience->translate_description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr class="styled_2">
                    <div class="indent_title_in">
                        <i class="pe-7s-display1"></i>
                        <h3>{{ trans("general.Course") }}</h3>
                        <p>{{ trans("general.All Courses With") }} {{ $lecturer->name }}</p>
                    </div>
                    <div class="wrapper_indent">
                        <div class="table-responsive">
                            <table class="table table-striped add_bottom_30">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">{{ trans("general.Semester") }}</th>
                                        <th class="text-nowrap">{{ trans("general.Study Program") }}</th>
                                        <th class="text-nowrap">{{ trans("general.Course Code") }}</th>
                                        <th class="text-nowrap">{{ trans("general.Course Name") }}</th>
                                        <th class="text-nowrap">{{ trans("general.SKS") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_course_lecturer as $course_lecturer)
                                        <tr>
                                            <td class="text-center">{{ $course_lecturer->course?->semester == 0 ? trans("general.Matriculation") : $course_lecturer->course?->semester }}</td>
                                            <td>{{ $course_lecturer->course?->study_program?->translate_name }}</td>
                                            <td>{{ $course_lecturer->course?->code }}</td>
                                            <td>{{ $course_lecturer->course?->name }}</td>
                                            <td>{{ $course_lecturer->course?->sks }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container margin_60_35">
        <h3 class="text-center mb-3">{{ trans("general.Our Lecturer") }}</h3>
        <div class="row">
            @foreach ($data_other_lecturer as $other_lecturer)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="box_grid wow">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            @if ($other_lecturer->instagram)
                                <a draggable="false" href="{{ $other_lecturer->instagram }}" target="_blank" class="wish_bt"></a>
                            @endif
                            <a draggable="false" href="{{ route("{$menu_slug}.view", ["lecturer_slug" => $other_lecturer->slug]) }}">
                                <img draggable="false" class="img-fluid w-100"
                                    src="{{ $other_lecturer->assetImage() }}"
                                    alt="{{ trans("page.{$menu_name}") }} - {{ $other_lecturer->name }} - {{ env("APP_TITLE") }}">
                            </a>
                            {{-- <div class="price">$54</div> --}}
                            <div class="preview"><span>{{ trans("general.View Detail") }}</span></div>
                        </figure>
                        <div class="wrapper">
                            <small>{{ $other_lecturer->job }}</small>
                            <h3>{{ $other_lecturer->name }}</h3>
                            <p>{{ strip_tags(Str::limit($other_lecturer->description, 200)) }}</p>
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
                            <li><a draggable="false" href="{{ route("{$menu_slug}.view", ["lecturer_slug" => $other_lecturer->slug]) }}">{{ trans("button.View Detail") }}</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="text-center">
            <a draggable="false" href="{{ route("{$menu_slug}.index") }}" class="btn_1 rounded add_top_30">
                {{ trans("general.Back To All Lecturer") }}
            </a>
        </p>
    </div>
</div>
