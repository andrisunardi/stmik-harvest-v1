<div>
    <form wire:submit.prevent="submit" role="form" autocomplete="off">

        <div class="row">
            <div class="form-group col-sm-6 mb-3">
                @php $input = "advertisement_provider_id" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-tags fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <select
                        class="form-select select2 @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        required>
                        <option value="">{{ trans("index.select") }} {{ trans("validation.attributes.{$input}") }}</option>
                        @foreach ($advertisementProviders as $advertisementProvider)
                            <option value="{{ $advertisementProvider->id }}" {{ $advertisementProvider->id == $advertisement_provider_id ? "selected" : null }}>{{ $advertisementProvider->name }}</option>
                        @endforeach
                    </select>
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-sm-6 mb-3">
                @php $input = "bank_id" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-bank fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <select
                        class="form-select select2 @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        required>
                        <option value="">{{ trans("index.select") }} {{ trans("validation.attributes.{$input}") }}</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}" {{ $bank->id == $bank_id ? "selected" : null }}>{{ $bank->name }}</option>
                        @endforeach
                    </select>
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6 mb-3">
                @php $input = "account_number" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-user fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <input
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        type="text"
                        minlength="1"
                        maxlength="20"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" />
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-sm-6 mb-3">
                @php $input = "account_name" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-user fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <input
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        type="text"
                        minlength="1"
                        maxlength="30"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" />
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6 mb-3">
                @php $input = "amount" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-rupiah-sign fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <input
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        type="number"
                        min="0"
                        max="4294967295"
                        minlength="1"
                        maxlength="10"
                        placeholder="{{ trans("validation.attributes.{$input}") }}"
                        required />
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-sm-6 mb-3">
                @php $input = "image" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-image fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <input
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        type="file"
                        accept="{{ env("ACCEPT_FILE") }}"
                        placeholder="{{ trans("validation.attributes.{$input}") }}" />
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>

                <div class="form-text mt-2">
                    {{ trans("index.format") }} : {{ env("FORMAT_FILE") }} | {{ trans("index.size") }} : {{ env("SIZE_FILE") }}
                </div>

                <div class="alert alert-info w-100 mt-3" role="alert" wire:loading wire:target="{{ $input }}">
                    {{ trans("index.please_wait_until_the_uploading_finished") }}
                </div>

                @if ($image || ($pageType != "add" && $buyAdvertisement->checkImage()))
                    @if ($image ? $image->temporaryUrl() : $buyAdvertisement->checkImage())
                        <img draggable="false" class="img-fluid img-thumbnail rounded w-100 mt-3"
                            src="{{ $image ? $image->temporaryUrl() : $buyAdvertisement->assetImage() }}"
                            alt="{{ $image ? trans("index.temporary_url") : $buyAdvertisement->altImage() }}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="{{ trans("index.click_to_view") }}" />
                        <div class="mt-3">
                            <a draggable="false" class="btn btn-sm btn-primary" href="{{ $image ? $image->temporaryUrl() : $buyAdvertisement->assetImage() }}" target="_blank">
                                <i class="fas fa-eye me-1"></i>
                                {{ trans("index.view") }}
                            </a>
                            <a draggable="false" class="btn btn-sm btn-info text-white" href="{{ $image ? $image->temporaryUrl() : $buyAdvertisement->assetImage() }}" download>
                                <i class="fas fa-download me-1"></i>
                                {{ trans("index.download") }}
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6 mb-3">
                @php $input = "date" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-calendar fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <input
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        type="date"
                        placeholder="{{ trans("validation.attributes.{$input}") }}"
                        required />
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-sm-6 mb-3">
                @php $input = "time" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-clock fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <input
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        type="time"
                        step="1"
                        placeholder="{{ trans("validation.attributes.{$input}") }}"
                        required />
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6 mb-3">
                @php $input = "notes" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-file-alt fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <textarea
                        class="form-control @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        minlength="1"
                        maxlength="65535"
                        placeholder="{{ trans("validation.attributes.{$input}") }}">
                    </textarea>
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-sm-6 mb-3">
                @php $input = "is_active" @endphp
                <label for="{{ $input }}" class="form-label @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif">
                    {{ trans("validation.attributes.{$input}") }}
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <div class="input-group-text @if ($errors->any()) {{ $errors->has($input) ? "border-danger" : "border-success" }}@endif">
                        <span class="fas fa-check fa-fw @if ($errors->any()) {{ $errors->has($input) ? "text-danger" : "text-success" }}@endif"></span>
                    </div>
                    <select
                        class="form-select select2 @if ($errors->any()) {{ $errors->has($input) ? "is-invalid" : "is-valid" }}@endif"
                        wire:model="{{ $input }}"
                        id="{{ $input }}"
                        required>
                        <option value="">{{ trans("index.select") }} {{ trans("validation.attributes.{$input}") }}</option>
                        <option value="1" {{ 1 == $is_active ? "selected" : null }}>{{ trans("index.active") }}</option>
                        <option value="0" {{ 0 == $is_active ? "selected" : null }}>{{ trans("index.in_active") }}</option>
                    </select>
                    @error($input)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="valid-feedback">{{ trans("validation.success") }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-auto">
                <button type="submit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                    <i class="fas fa-save me-1"></i>
                    {{ trans("index.save") }}
                    <div wire:loading wire:target="submit"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
            <div class="col-6 col-sm-auto">
                <button type="button" class="btn btn-warning text-white w-100" wire:click="{{ $pageType == "add" ? "resetFilter" : "resetForm" }}" wire:loading.attr="disabled">
                    <i class="fas fa-rotate-left me-1"></i>
                    {{ trans("index.reset") }}
                    <div wire:loading wire:target="{{ $pageType == "add" ? "resetFilter" : "resetForm" }}"><i class="fas fa-spinner fa-spin"></i></div>
                </button>
            </div>
        </div>
    </form>
</div>
