@section("name", $news->translate_name)
@section("icon", $menu_icon)

@section("{$menu_slug}-active", "active")

<div>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">
                <div class="bloglist singlepost">
                    <p>
                        <img draggable="false" src="{{ $news->assetImage() }}" class="img-fluid w-100"
                            alt="{{ trans("general.News") }} - {{ $news->translate_name }} - {{ env("APP_TITLE") }}">
                    </p>

                    <h1>{{ $news->translate_name }}</h1>

                    <div class="postmeta">
                        <ul>
                            <li>
                                <a draggable="false" href="{{ route("{$menu_slug}.index") . "?category={$news->news_category?->id}" }}">
                                    <i class="icon_folder-alt me-1"></i>
                                    {{ $news->news_category?->translate_name }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" href="javascript:;">
                                    <i class="icon_clock_alt me-1"></i>
                                    {{ Date::parse($news->date)->format("d F Y") }}
                                </a>
                            </li>
                            <li>
                                <a draggable="false" href="javascript:;">
                                    <i class="icon_pencil-edit me-1"></i>
                                    Administrator
                                </a>
                            </li>
                            <li>
                                <a draggable="false" href="{{ route("{$menu_slug}.view", ["news_slug" => $news->slug]) }}#comments">
                                    <i class="icon_comment_alt me-1"></i>
                                    ({{ $news->data_news_comment->count() }})
                                    {{ trans("general.Comments") }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="post-content">
                        <div class="dropcaps">
                            <p>{!! html_entity_decode($news->translate_description) !!}</p>
                        </div>
                    </div>
                </div>

                <div id="comments">
                    <h5>{{ $news->data_news_comment->count() }} {{ trans("general.Comments") }}</h5>
                    <ul>
                        @foreach ($data_news_comment as $news_comment)
                            <li>
                                <div class="avatar">
                                    <a draggable="false" href="#">
                                        <img draggable="false" src="{{ asset("images/user.png") }}" class="img-fluid w-100" alt="{{ trans("general.User") }} - {{ env("APP_TITLE") }}">
                                    </a>
                                </div>
                                <div class="comment_right clearfix">
                                    <div class="comment_info">
                                        {{-- {{ trans("general.By") }} --}}
                                        {{-- <a draggable="false" href="javascript:;">{{ $news_comment->name }}</a> --}}
                                        {{ $news_comment->name }}
                                        <span>|</span>
                                        {{ $news_comment->created_at->format("H:i:s - l, d F Y") }}
                                        {{-- <a draggable="false" href="javascript:;">Reply</a> --}}
                                    </div>
                                    <h6>{{ $news_comment->name }}</h6>
                                    <p>{!! html_entity_decode($news_comment->message) !!}</p>
                                </div>
                                {{-- <ul class="replied-to">
                                    <li>
                                        <div class="avatar">
                                            <a draggable="false" href="#"><img src="img/avatar2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="comment_right clearfix">
                                            <div class="comment_info">
                                                By <a draggable="false" href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a draggable="false" href="#">Reply</a>
                                            </div>
                                            <p>
                                                Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                            </p>
                                            <p>
                                                Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                            </p>
                                        </div>
                                        <ul class="replied-to">
                                            <li>
                                                <div class="avatar">
                                                    <a draggable="false" href="#"><img src="img/avatar2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="comment_right clearfix">
                                                    <div class="comment_info">
                                                        By <a draggable="false" href="#">Anna Smith</a><span>|</span>25/10/2019<span>|</span><a draggable="false" href="#">Reply</a>
                                                    </div>
                                                    <p>
                                                        Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                                    </p>
                                                    <p>
                                                        Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul> --}}
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- <hr>

                @include("layouts.alert")

                <h5>{{ trans("general.Leave a Comment") }}</h5>
                <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("{$menu_slug}.index") }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        @php $input = "name" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-user"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                    autocomplete="off" autocapitalize="none" required>
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>

                        @php $input = "phone" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} ({{ trans("general.Not Visible For Public") }})</label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-call"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="15" value="{{ old($input) }}"
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

                    <div class="row">
                        @php $input = "email" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span> ({{ trans("general.Not Visible For Public") }})</label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-email"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="email" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                    autocomplete="off" autocapitalize="none" required>
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>

                        @php $input = "title" @endphp
                        <div class="form-group col-sm-6">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-font"></span></div>
                                <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
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

                    <div class="row">
                        @php $input = "message" @endphp
                        <div class="form-group col-12">
                            <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><span class="icon-pencil"></span></div>
                                <textarea wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                                    class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="1000"
                                    placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                                    autocomplete="off" autocapitalize="none" required>{{ old($input) }}</textarea>
                                @error($input)
                                    <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                                @else
                                    <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact">
                        <button class="btn_1 rounded" type="button" wire:click="submit">
                            <i class="icon-paper-plane me-1"></i>
                            {{ trans("button.Submit") }}
                        </button>
                    </div>
                </form> --}}
            </div>

            @include("livewire.{$menu_slug}.sidebar")

        </div>
    </div>
</div>
