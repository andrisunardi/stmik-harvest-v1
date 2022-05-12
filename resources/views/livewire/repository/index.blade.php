@section("name", trans("page.{$menu_name}"))
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="filters_listing sticky_horizontal">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <div class="switch-field">
                        <input type="radio" id="all" name="listing_filter" value="all" checked>
                        <label for="all">All</label>
                        <input type="radio" id="popular" name="listing_filter" value="popular">
                        <label for="popular">Popular</label>
                        <input type="radio" id="latest" name="listing_filter" value="latest">
                        <label for="latest">Latest</label>
                    </div>
                </li>
                <li>
                    <div class="layout_view">
                        <a draggable="false" href="courses-grid.html"><i class="icon-th"></i></a>
                        <a draggable="false" href="#0" class="active"><i class="icon-th-list"></i></a>
                    </div>
                </li>
                <li>
                    <select name="orderby" class="selectbox">
                        <option value="category">Category</option>
                        <option value="category 2">Literature</option>
                        <option value="category 3">Architecture</option>
                        <option value="category 4">Economy Economy</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>

    <div class="container margin_60_35">
        <div class="row">

            @include("livewire.{$menu_slug}.sidebar")

            <div class="col-lg-9" id="list_sidebar">

                <form wire:submit.prevent="submit" class="was-validated-delete mb-5" method="post" role="form" action="{{ route("{$menu_slug}.index") }}" id="contactform" autocomplete="off">
                    @csrf
                    <div class="row">
                        @php $input = "subject" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-tag-1"></span></div>
                                <select wire:model="{{ $input }}" class="form-select @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" id="{{ $input }}" name="{{ $input }}" required>
                                    <option value="">{{ trans("general.Select") }} {{ trans("validation.attributes.{$input}") }}</option>
                                    @foreach ($data_repository_subject as $repository_subject)
                                        <option value="{{ $repository_subject->id }}">{{ $repository_subject->name }}</option>
                                    @endforeach
                                </select>
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>

                        @php $input = "study_program" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-graduation-cap"></span></div>
                                <select wire:model="{{ $input }}" class="form-select @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" id="{{ $input }}" name="{{ $input }}" required>
                                    <option value="">{{ trans("general.Select") }} {{ trans("validation.attributes.{$input}") }}</option>
                                    @foreach ($data_study_program as $study_program)
                                        <option value="{{ $study_program->id }}">{{ $study_program->name }}</option>
                                    @endforeach
                                </select>
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @php $input = "title" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-doc"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="search" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                    autocomplete="off" autocapitalize="none" required>
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>

                        @php $input = "abstract" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-pencil"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="search" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                    autocomplete="off" autocapitalize="none" required>
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @php $input = "author" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-user"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="search" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="15" value="{{ old($input) }}"
                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                    autocomplete="off" autocapitalize="none">
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>

                        @php $input = "year" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-calendar"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="number" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" min="2000" max="{{ now()->format("Y") }}" minlength="4" maxlength="4" value="{{ old($input) }}"
                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                    autocomplete="off" autocapitalize="none">
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div>
                        <input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact">
                        <button class="btn_1 rounded" type="button" wire:click="submit">
                            <i class="icon-paper-plane me-1"></i>
                            {{ trans("button.Send Request") }}
                        </button>
                    </div> --}}
                </form>

                @foreach ($data_repository as $repository)
                    <div class="box_list wow">
                        <div class="row g-0">
                            <div class="col-lg-5">
                                <figure class="block-reveal">
                                    <div class="block-horizzontal"></div>
                                    <a draggable="false" href="{{ route("{$menu_slug}.view", ["repository_slug" => $repository->slug]) }}">
                                        <img draggable="false" src="{{ $repository->assetImage() }}" class="img-fluid w-100"
                                            alt="{{ trans("general.{$menu_name}") }} - {{ $repository->title }} - {{ env("APP_TITLE") }}">
                                    </a>
                                    <div class="preview"><span>{{ trans("general.View Repository") }}</span></div>
                                </figure>
                            </div>
                            <div class="col-lg-7">
                                <div class="wrapper">
                                    {{-- <a draggable="false" href="#0" class="wish_bt"></a> --}}
                                    <div class="price">{{ $repository->repository_subject?->name }}</div>
                                    <small>{{ $repository->study_program?->translate_name }}</small>
                                    <h3>{{ strip_tags(Str::limit($repository->title, 100)) }}</h3>
                                    <p>{{ strip_tags(Str::limit($repository->abstract, 100)) }}</p>
                                    <div class="rating">
                                        {{-- <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i> --}}
                                        <i class="icon-key"></i>
                                        <small>
                                            @foreach ($repository->data_keyword() as $keyword)
                                                <a draggable="false" href="{{ route("{$menu_slug}.index") . "?search={$keyword}" }}">{{ $keyword }}</a>
                                            @endforeach
                                        </small>
                                    </div>
                                </div>
                                <ul>
                                    <li><i class="icon_clock_alt"></i> {{ $repository->year }}</li>
                                    <li><i class="icon_like"></i> {{ $repository->full_name }}</li>
                                    <li><a draggable="false" href="{{ route("{$menu_slug}.view", ["repository_slug" => $repository->slug]) }}">{{ trans("general.View Repository") }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $data_repository->links("vendor.livewire.bootstrap") }}

                {{-- <p class="text-center add_top_60"><a draggable="false" href="#0" class="btn_1 rounded">{{ trans("button.Load More") }}</a></p> --}}
            </div>
        </div>
    </div>

    {{-- <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-4">
                    <a draggable="false" href="#0" class="boxed_list">
                        <i class="pe-7s-help2"></i>
                        <h4>Need Help? Contact us</h4>
                        <p>Cum appareat maiestatis interpretaris et, et sit.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a draggable="false" href="#0" class="boxed_list">
                        <i class="pe-7s-wallet"></i>
                        <h4>Payments and Refunds</h4>
                        <p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a draggable="false" href="#0" class="boxed_list">
                        <i class="pe-7s-note2"></i>
                        <h4>Quality Standards</h4>
                        <p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
</div>
