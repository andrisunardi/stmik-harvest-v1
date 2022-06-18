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
                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="100" value="{{ old($input) }}"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                        autocomplete="off" autocapitalize="none" required>
                    @error($input)
                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                    @else
                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>

            @php $input = "name_id" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                <div class="input-group has-validation">
                    <div class="input-group-text"><span class="bi bi-fonts"></span></div>
                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="100" value="{{ old($input) }}"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                        autocomplete="off" autocapitalize="none" required>
                    @error($input)
                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                    @else
                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
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
                            class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="65535"
                            placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                            autocomplete="off" autocapitalize="none" value="{{ $this->description ?? $gallery->description ?? null }}" readonly>
                        @error($input)
                            <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                        @else
                            <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
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
                            class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="65535"
                            placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                            autocomplete="off" autocapitalize="none" value="{{ $this->description_id ?? $gallery->description_id ?? null }}" readonly>
                        @error($input)
                            <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                        @else
                            <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @php $input = "category" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
                <div class="input-group has-validation">
                    <div class="input-group-text"><span class="bi bi-tags"></span></div>
                    <select wire:model="{{ $input }}" class="form-select @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" id="{{ $input }}" name="{{ $input }}" required>
                        <option value="">{{ trans("index.Select") }} {{ trans("validation.attributes.{$input}") }}</option>
                        <option value="1">{{ trans("index.Image") }}</option>
                        <option value="2">{{ trans("index.Video") }}</option>
                        <option value="3">{{ trans("index.Youtube") }}</option>
                    </select>
                    <a draggable="false" href="javascript:;" class="btn btn-info" wire:click="getData{{ Str::studly($input) }}">
                        <i class="fas fa-sync fa-spin"></i>
                    </a>
                    @error($input)
                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                    @else
                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>

            @php $input = "youtube" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <div class="input-group has-validation">
                    <div class="input-group-text"><span class="bi bi-youtube"></span></div>
                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                        type="text" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                        autocomplete="off" autocapitalize="none">
                    @error($input)
                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                    @else
                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            @php $input = "image" @endphp
            <div class="form-group col-sm-6">
                <div class="card bg-primary bg-gradient w-100 mb-3" wire:loading wire:target="{{ $input }}">
                    <div class="card-body p-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-upload text-white" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                        <h4 class="text-white mt-3">{{ trans("index.Uploading") }}</h4>
                        <p class="text-white mb-0">{{ trans("index.Please wait until the uploading finished") }}</p>
                    </div>
                </div>

                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <div class="file-upload-card">
                    <svg class="bi bi-file-earmark-arrow-up text-primary" width="48" height="48" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"></path>
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"></path>
                        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 7.707V11.5a.5.5 0 0 0 .5.5z"></path>
                    </svg>
                    <h5 class="mt-2 mb-4">{{ trans("index.Upload your images") }}</h5>
                    <div class="form-file">
                        <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="customFile" name="{{ $input }}"
                            type="file" class="form-control d-none @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                            placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                            accept="image/*;capture=camera image/jpg,image/jpeg,image/png,image/gif,image/"
                            autocomplete="off" autocapitalize="none" required>
                        <label class="form-file-label justify-content-center" for="customFile">
                            <span class="form-file-button btn btn-primary shadow w-100">{{ trans("index.Upload Image") }}</span>
                        </label>
                        @error($input)
                            <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                        @else
                            <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                        @enderror
                    </div>
                    <h6 class="mt-4 mb-0">{{ trans("index.Supported images and max size") }}</h6>
                    <small>.jpg .jpeg .png .gif .webp, 1 GB</small>
                </div>
            </div>

            @php $input = "preview_image" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <br>
                @if ($image)
                    <a draggable="false" href="#image" data-bs-toggle="modal">
                        <img draggable="false" class="img-fluid img-thumbnail rounded w-100 h-auto"
                            src="{{ $image->temporaryUrl() }}"
                            alt="{{ trans("page.{$menu_name}") }} - {{ trans("index.Temporary Url") }} - {{ env("APP_TITLE") }}"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                    </a>
                    <div class="modal fade" id="image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="image">{{ trans("index.Image") }} - {{ trans("page.{$menu_name}") }}</h6>
                                    <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <a draggable="false" href="{{ $image->temporaryUrl() }}" target="_blank">
                                        <img draggable="false" class="img-fluid w-100"
                                            src="{{ $image->temporaryUrl() }}"
                                            alt="{{ trans("page.{$menu_name}") }} - {{ trans("index.Temporary Url") }} - {{ env("APP_TITLE") }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                                    </a>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                        <i class="bi bi-x me-1"></i>
                                        {{ trans("index.Close") }}
                                    </button>
                                    <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $image->temporaryUrl() }}" download>
                                        <i class="bi bi-download me-1"></i>
                                        {{ trans("index.Download") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @if ($menu_type != "add")
                        @if ($gallery->checkImage())
                            <a draggable="false" href="#image" data-bs-toggle="modal">
                                <img draggable="false" class="img-fluid img-thumbnail rounded w-100 h-auto"
                                    src="{{ $gallery->assetImage() }}"
                                    alt="{{ trans("page.{$menu_name}") }} - {{ $gallery->translate_name }} - {{ env("APP_TITLE") }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                            </a>
                            <div class="modal fade" id="image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="image" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="image">{{ trans("index.Image") }} - {{ trans("page.{$menu_name}") }}</h6>
                                            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a draggable="false" href="{{ $gallery->assetImage() }}" target="_blank">
                                                <img draggable="false" class="img-fluid w-100"
                                                    src="{{ $gallery->assetImage() }}"
                                                    alt="{{ trans("page.{$menu_name}") }} - {{ $gallery->translate_name }} - {{ env("APP_TITLE") }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans("index.Click To View") }}">
                                            </a>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-creative btn-sm btn-light" type="button" data-bs-dismiss="modal">
                                                <i class="bi bi-x me-1"></i>
                                                {{ trans("index.Close") }}
                                            </button>
                                            <a draggable="false" class="btn btn-creative btn-sm btn-primary" href="{{ $gallery->assetImage() }}" download>
                                                <i class="bi bi-download me-1"></i>
                                                {{ trans("index.Download") }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
        </div>

        <div class="row">
            @php $input = "video" @endphp
            <div class="form-group col-sm-6">
                <div class="card bg-danger bg-primary w-100 mb-3" wire:loading wire:target="{{ $input }}">
                    <div class="card-body p-5 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-upload text-white" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                        <h4 class="text-white mt-3">{{ trans("index.Uploading") }}</h4>
                        <p class="text-white mb-0">{{ trans("index.Please wait until the uploading finished") }}</p>
                    </div>
                </div>

                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <div class="input-group has-validation">
                    <div class="input-group-text"><span class="bi bi-camera-video"></span></div>
                    <input wire:model="{{ $input }}" wire:keydown.enter="submit" id="{{ $input }}" name="{{ $input }}"
                        type="file" class="form-control @if($errors->any() || Session::has("info") || Session::has("success") || Session::has("warning") || Session::has("danger")) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif" minlength="1" maxlength="50" value="{{ old($input) }}"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" aria-label="{{ trans("validation.attributes.{$input}") }}" aria-describedby="{{ trans("validation.attributes.{$input}") }}"
                        accept="application/mp4" autocomplete="off" autocapitalize="none" required>
                    @error($input)
                        <div class="invalid-feedback rounded bg-danger p-2 ms-0 mt-2 text-white">{{ $message }}</div>
                    @else
                        <div class="valid-feedback rounded bg-success p-2 ms-0 mt-2 text-white">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
                <h6 class="mt-3 mb-0">{{ trans("index.Supported images and max size") }}</h6>
                <small>.mp4, 1 GB</small>
            </div>

            @php $input = "preview_video" @endphp
            <div class="form-group col-sm-6">
                <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                <br>
                @if ($video)
                    <video src="{{ $video->temporaryUrl() }}" controls>
                        <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                    </video>
                    <div class="mt-3">
                        <a draggable="false" class="btn btn-creative btn-sm btn-danger" href="{{ $video->temporaryUrl() }}" target="_blank">
                            <i class="bi bi-video me-1"></i>
                            {{ trans("index.View") }}
                        </a>
                    </div>
                @else
                    @if ($menu_type != "add")
                        @if ($gallery->checkVideo())
                            <iframe src="{{ $gallery->assetVideo() }}" class="w-100 h-auto" frameborder="0"></iframe>
                            <div class="mt-3">
                                <a draggable="false" class="btn btn-creative btn-sm btn-danger" href="{{ $gallery->assetVideo() }}" target="_blank">
                                    <i class="bi bi-video me-1"></i>
                                    {{ trans("index.View") }}
                                </a>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
        </div>

        @php $input = "active" @endphp
        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }} <span class="text-danger">*</span></label>
        <div class="row mb-3">
            <div class="col-sm-6">
                <div class="single-plan-check {{ $active || $menu_type == "add" ? "active" : null }} shadow-sm active-effect">
                    <div class="form-check mb-0">
                        <input wire:model="{{ $input }}" class="form-check-input" type="radio" name="{{ $input }}" id="active" value="1" required>
                        <label class="form-check-label" for="active">{{ trans("index.Active") }}</label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-6 mt-3 mt-sm-0">
                <div class="single-plan-check {{ is_null($input)&& $menu_type != "add" ? "active" : null }} shadow-sm active-effect">
                    <div class="form-check mb-0">
                        <input wire:model="{{ $input }}" class="form-check-input" type="radio" name="{{ $input }}" id="non-active" value="0" required>
                        <label class="form-check-label" for="non-active">{{ trans("index.Non Active") }}</label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle-fill text-danger" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-auto">
                <button type="button" class="btn btn-creative btn-primary w-100" wire:click="submit" wire:loading.attr="disabled">
                    <i class="bi bi-save-fill me-1"></i>
                    {{ trans("index.Save") }}
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button type="button" class="btn btn-creative btn-warning w-100" wire:click="{{ $menu_type == "add" ? "resetFilter" : "resetForm" }}" wire:loading.attr="disabled">
                    <i class="bi bi-arrow-repeat me-1"></i>
                    {{ trans("index.Reset") }}
                </button>
            </div>
        </div>
    </form>
</div>
