<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="was-validated-delete" method="post" role="form" action="{{ route("{$sub_domain}.{$menu_slug}.index") }}">
        @csrf

        <div class="row">
            @php $input = "name" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                <div class="input-group has-validation">
                    <div class="input-group-text"><span class="bi bi-fonts"></span></div>
                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="100" value="{{ old(Str::slug($input, "_")) }}"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                        autocomplete="off" autocapitalize="none" required>
                    @error(Str::slug($input, "_"))
                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                    @else
                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                    @enderror
                </div>
            </div>

            @php $input = "name_id" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                <div class="input-group has-validation">
                    <div class="input-group-text"><span class="bi bi-fonts"></span></div>
                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="100" value="{{ old(Str::slug($input, "_")) }}"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                        autocomplete="off" autocapitalize="none" required>
                    @error(Str::slug($input, "_"))
                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                    @else
                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            @php $input = "description" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <div class="has-validation">
                    <div wire:ignore wire:model.debounce.500ms="{{ $input }}">
                        <trix-editor input="{{ $input }}"></trix-editor>
                        <input type="text" wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                            class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="65535"
                            placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                            autocomplete="off" autocapitalize="none" value="{{ $this->description ?? $news_category->description ?? null }}" readonly>
                        @error(Str::slug($input, "_"))
                            <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                        @else
                            <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            @php $input = "description_id" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <div class="has-validation">
                    <div wire:ignore wire:model.debounce.500ms="{{ $input }}">
                        <trix-editor input="{{ $input }}"></trix-editor>
                        <input type="text" wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                            class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has(Str::slug($input, "_")) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="65535"
                            placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                            autocomplete="off" autocapitalize="none" value="{{ $this->description_id ?? $news_category->description_id ?? null }}" readonly>
                        @error(Str::slug($input, "_"))
                            <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                        @else
                            <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.Looks Good") }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        @php $input = "active" @endphp
        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
        <div class="row mb-3">
            <div class="col-sm-6">
                <div class="single-plan-check {{ $active || $menu_type == "add" ? "active" : null }} shadow-sm active-effect">
                    <div class="form-check mb-0">
                        <input wire:model="{{ $input }}" class="form-check-input" type="radio" name="{{ $input }}" id="active" value="1" required>
                        <label class="form-check-label" for="active">{{ trans("general.Active") }}</label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-6 mt-3 mt-sm-0">
                <div class="single-plan-check {{ is_null(Str::slug($input, "_"))&& $menu_type != "add" ? "active" : null }} shadow-sm active-effect">
                    <div class="form-check mb-0">
                        <input wire:model="{{ $input }}" class="form-check-input" type="radio" name="{{ $input }}" id="non-active" value="0" required>
                        <label class="form-check-label" for="non-active">{{ trans("general.Non Active") }}</label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-auto">
                <button class="btn btn-primary w-100" type="button" wire:click="submit">
                    <i class="bi bi-save-fill me-1"></i>
                    {{ trans("button.Save") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button class="btn btn-warning w-100" type="button" wire:click="{{ $menu_type == "add" ? "resetFilter" : "resetForm" }}">
                    <i class="bi bi-arrow-repeat me-1"></i>
                    {{ trans("button.Reset") }}
                </button>
            </div>
        </div>
    </form>
</div>
