@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

@push("meta")
    <meta name="citation_title" content="{{ $repository->title }}">
    <meta name="citation_author" content="{{ $repository->full_name }}">
    @if ($repository->corporate)
        <meta name="citation_author" content="{{ $repository->corporate }}">
    @endif
    <meta name="citation_publication_date" content="{{ $repository->publication_date ?? now()->format("Y-m-d") }}">
    <meta name="citation_journal_title" content="{{ $repository->journal_title ??$repository->repository_subject?->name }}">
    <meta name="citation_date" content="{{ $repository->date ?? now()->format("Y-m-d") }}">
    <meta name="citation_volume" content="{{ $repository->volume ?? 1 }}">
    <meta name="citation_issue" content="{{ $repository->issue ?? 1 }}">
    <meta name="citation_firstpage" content="{{ $repository->first_page ?? 1 }}">
    <meta name="citation_lastpage" content="{{ $repository->last_page ?? $repository->page ?? 1 }}">
    @if ($repository->checkFile())
        <meta name="citation_pdf_url" content="{{ $repository->assetFile() }}">
    @endif
@endpush

<div>
    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a draggable="false" href="#abstract" class="active">{{ trans("general.Abstract") }}</a></li>
                    <li><a draggable="false" href="#keyword">{{ trans("general.Keyword") }}</a></li>
                    <li><a draggable="false" href="#file">{{ trans("general.File") }}</a></li>
                    <li><a draggable="false" href="#contributor">{{ trans("general.Contributor") }}</a></li>
                </ul>
            </div>
        </nav>

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    {{-- <section id="abstract">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    <li>Dolorem mediocritatem</li>
                                    <li>Mea appareat</li>
                                    <li>Prima causae</li>
                                    <li>Singulis indoctum</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    <li>Timeam inimicus</li>
                                    <li>Oportere democritum</li>
                                    <li>Cetero inermis</li>
                                    <li>Pertinacia eum</li>
                                </ul>
                            </div>
                        </div>
                    </section> --}}

                    <section id="abstract">
                        <div class="intro_title">
                            <h2>{{ trans("general.Abstract") }}</h2>
                            <ul>
                                <li>{{ Str::length($repository->abstract) }} {{ trans("general.Character") }}</li>
                            </ul>
                        </div>
                        <p>{!! html_entity_decode($repository->abstract) !!}</p>
                    </section>

                    <hr>

                    <section id="keyword">
                        <div class="intro_title">
                            <h2>{{ trans("general.Keyword") }}</h2>
                            {{-- <ul>
                                <li>{{ Str::of($repository->keyword, ",")->wordCount() }} {{ trans("general.Character") }}</li>
                            </ul> --}}
                        </div>
                        <p>{!! html_entity_decode($repository->keyword) !!}</p>
                    </section>

                    <hr>

                    <section id="file">
                        <div class="intro_title">
                            <h2>{{ trans("general.File") }}</h2>
                            <ul>
                                <li>{{ $repository->data_repository_file->count() }} {{ trans("general.File") }}</li>
                            </ul>
                        </div>
                        <div id="accordion_lessons" role="tablist" class="add_bottom_45">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ trans("general.List File In This Repository") }}</p>
                                    <div class="list_lessons_2">
                                        <ul>
                                            @foreach ($repository->data_repository_file as $repository_file)
                                                <li>
                                                    <strong>
                                                        <a draggable="false" href="{{ $repository_file->assetFile() }}" target="_blank">
                                                            {{ $repository_file->name }}
                                                        </a>
                                                    </strong>
                                                    <span>
                                                        <a draggable="false" href="{{ $repository_file->assetFile() }}" download>
                                                            <i class="icon_download"></i>
                                                            Download PDF
                                                            ({{ $repository_file->formatBytesFile() }})
                                                        </a>
                                                    </span>
                                                    <br>
                                                    {{ $repository_file->description ?? "-" }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <hr>

                    <section id="contributor">
                        <div class="intro_title">
                            <h2>{{ trans("general.Contributor") }}</h2>
                            <ul>
                                <li>{{ $repository->data_repository_contributor->count() }} {{ trans("general.Contributor") }}</li>
                            </ul>
                        </div>
                        <p>{{ trans("general.List of contributors who contribute in this repository.") }}</p>
                        <div class="row add_top_20 add_bottom_30">
                            @foreach ($repository->data_repository_contributor as $repository_contributor)
                                <div class="col-lg-6">
                                    <ul class="list_teachers">
                                        <li>
                                            <a draggable="false" href="{{ $repository_contributor->lecturer?->id ? route("lecturer.view", ["lecturer_slug" => $repository_contributor->lecturer?->slug]) : "javascript:;" }}">
                                                <figure>
                                                    <img draggable="false" class="img-fluid w-100"
                                                        src="{{ $repository_contributor->lecturer?->assetImage() ?? asset("images/lecturer.png") }}"
                                                        alt="{{ trans("page.Lecturer") }} - {{ $repository_contributor->lecturer?->name ?? $repository_contributor->name }} - {{ env("APP_TITLE") }}">
                                                </figure>
                                                <h5>{{ $repository_contributor->name ?? $repository_contributor->lecturer?->name }}</h5>
                                                <p>{{ $repository_contributor->role ?? $repository_contributor->lecturer?->job }}</p>
                                                <i class="pe-7s-angle-right-circle"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail">
                        <figure>
                            <a draggable="false" href="{{ $repository->assetImage() }}" target="_blank" class="video-delete">
                                <i class="icon-zoom-in"></i>
                                <img draggable="false" src="{{ $repository->assetImage() }}" class="img-fluid w-100"
                                    alt="{{ trans("general.{$menu_name}") }} - {{ $repository->title }} - {{ env("APP_TITLE") }}">
                                <span>{{ trans("general.Cover Image") }}</span>
                            </a>
                        </figure>
                        <div class="price">
                            {{ $repository->title }}
                            <span class="original_price">
                                {{ $repository->full_name }} ({{ $repository->year }})
                            </span>
                        </div>
                        {{-- <a draggable="false" href="#0" class="btn_1 full-width">Purchase</a>
                        <a draggable="false" href="#0" class="btn_1 full-width outline"><i class="icon_heart"></i> Add to wishlist</a> --}}
                        <div id="list_feat">
                            <h3>{{ trans("general.Repository Information") }}</h3>
                            <ul>
                                <li>
                                    <i class="icon-tag-1"></i>
                                    <b>{{ trans("field.Subject") }} :</b>
                                    <a draggable="false" href="{{ route("{$menu_slug}.index") . "?subject={$repository->repository_subject?->id}" }}">
                                        {{ $repository->repository_subject?->name }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icon-graduation-cap"></i>
                                    <b>{{ trans("field.Study Program") }} :</b>
                                    <a draggable="false" href="{{ route("{$menu_slug}.index") . "?study_program={$repository->study_program?->id}" }}">
                                        {{ $repository->study_program?->translate_name }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icon-calendar"></i>
                                    <b>{{ trans("field.Year") }} :</b>
                                    <a draggable="false" href="{{ route("{$menu_slug}.index") . "?year={$repository->year}" }}">
                                        {{ $repository->year }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icon-user"></i>
                                    <b>{{ trans("field.Author") }} :</b>
                                    {{ $repository->full_name }}
                                </li>
                                <li>
                                    <i class="icon-users"></i>
                                    <b>{{ trans("field.Corporate Author") }} :</b>
                                    {{ $repository->corporate_author ?? "-" }}
                                </li>
                                <li>
                                    <i class="icon-building"></i>
                                    <b>{{ trans("field.Publisher") }} :</b>
                                    {{ $repository->publisher ?? "-" }}
                                </li>
                                <li>
                                    <i class="icon-doc"></i>
                                    <b>{{ trans("field.Page") }} :</b>
                                    {{ $repository->page }}
                                </li>
                                <li>
                                    <i class="icon-link"></i>
                                    <b>{{ trans("field.URL") }} :</b>
                                    <a draggable="false" href="{{ $repository->url }}" target="_blank">
                                        {{ $repository->url }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icon-clock"></i>
                                    <b>{{ trans("field.Created") }} :</b>
                                    {{ $repository->created_at->format("H:i:s - l, d F Y") }}
                                </li>
                                <li>
                                    <i class="icon-clock"></i>
                                    <b>{{ trans("field.Updated") }} :</b>
                                    {{ $repository->updated_at->format("H:i:s - l, d F Y") }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
