<div>
    <div id="advanced-search" class="collapse {{ $advanced_search ? "show" : null }}">
        <div class="row">
            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "per_page" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="10" {{ 10 == $per_page ? "selected" : null }}>10</option>
                        <option value="25" {{ 25 == $per_page ? "selected" : null }}>25</option>
                        <option value="50" {{ 50 == $per_page ? "selected" : null }}>50</option>
                        <option value="100" {{ 100 == $per_page ? "selected" : null }}>100</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "order_by" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="id" {{ "id" == $order_by ? "selected" : null }}>{{ trans("index.id") }}</option>
                        <option value="event_category_id" {{ "event_category_id" == $order_by ? "selected" : null }}>{{ trans("index.event_category") }}</option>
                        <option value="title" {{ "title" == $order_by ? "selected" : null }}>{{ trans("index.title") }}</option>
                        <option value="title_idn" {{ "title_idn" == $order_by ? "selected" : null }}>{{ trans("index.title_idn") }}</option>
                        <option value="short_body" {{ "short_body" == $order_by ? "selected" : null }}>{{ trans("index.short_body") }}</option>
                        <option value="short_body_idn" {{ "short_body_idn" == $order_by ? "selected" : null }}>{{ trans("index.short_body_idn") }}</option>
                        <option value="body" {{ "body" == $order_by ? "selected" : null }}>{{ trans("index.body") }}</option>
                        <option value="body_idn" {{ "body_idn" == $order_by ? "selected" : null }}>{{ trans("index.body_idn") }}</option>
                        <option value="location" {{ "location" == $order_by ? "selected" : null }}>{{ trans("index.location") }}</option>
                        <option value="start" {{ "start" == $order_by ? "selected" : null }}>{{ trans("index.start") }}</option>
                        <option value="end" {{ "end" == $order_by ? "selected" : null }}>{{ trans("index.end") }}</option>
                        <option value="tag" {{ "tag" == $order_by ? "selected" : null }}>{{ trans("index.tag") }}</option>
                        <option value="tag_idn" {{ "tag_idn" == $order_by ? "selected" : null }}>{{ trans("index.tag_idn") }}</option>
                        <option value="slug" {{ "slug" == $order_by ? "selected" : null }}>{{ trans("index.slug") }}</option>
                        <option value="is_active" {{ "is_active" == $order_by ? "selected" : null }}>{{ trans("index.active") }}</option>
                        <option value="created_by_id" {{ "created_by_id" == $order_by ? "selected" : null }}>{{ trans("index.created_by") }}</option>
                        <option value="updated_by_id" {{ "updated_by_id" == $order_by ? "selected" : null }}>{{ trans("index.updated_by") }}</option>
                        @if ($pageType == "trash")
                            <option value="deleted_by_id" {{ "deleted_by_id" == $order_by ? "selected" : null }}>{{ trans("index.deleted_by") }}</option>
                        @endif
                        <option value="created_at" {{ "created_at" == $order_by ? "selected" : null }}>{{ trans("index.created_at") }}</option>
                        <option value="updated_at" {{ "updated_at" == $order_by ? "selected" : null }}>{{ trans("index.updated_at") }}</option>
                        @if ($pageType == "trash")
                            <option value="deleted_at" {{ "deleted_at" == $order_by ? "selected" : null }}>{{ trans("index.deleted_at") }}</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "sort_by" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="asc" {{ "asc" == $sort_by ? "selected" : null }}>{{ trans("index.ascending") }}</option>
                        <option value="desc" {{ "desc" == $sort_by ? "selected" : null }}>{{ trans("index.descending") }}</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "created_by_id" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="">{{ trans("index.all") }}</option>
                        @foreach ($createdBies as $createdBy)
                            <option value="{{ $createdBy->id }}" {{ $createdBy->id == $created_by_id ? "selected" : null }}>{{ $createdBy->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "updated_by_id" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="">{{ trans("index.all") }}</option>
                        @foreach ($updatedBies as $updatedBy)
                            <option value="{{ $updatedBy->id }}" {{ $updatedBy->id == $updated_by_id ? "selected" : null }}>{{ $updatedBy->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if ($pageType == "trash")
                @php $input = "deleted_by_id" @endphp
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    <div class="form-group">
                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                        <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                            <option value="">{{ trans("index.all") }}</option>
                            @foreach ($deletedBies as $deletedBy)
                                <option value="{{ $deletedBy->id }}" {{ $deletedBy->id == $deleted_by_id ? "selected" : null }}>{{ $deletedBy->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "start_created_at" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "end_created_at" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "start_updated_at" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "end_updated_at" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>

            @if ($pageType == "trash")
                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    @php $input = "start_deleted_at" @endphp
                    <div class="form-group">
                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                        <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                    </div>
                </div>

                <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                    @php $input = "end_deleted_at" @endphp
                    <div class="form-group">
                        <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                        <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                    </div>
                </div>
            @endif

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php $input = "is_active" @endphp
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="">{{ trans("index.all") }}</option>
                        <option value="1" {{ "1" == $is_active ? "selected" : null }}>{{ trans("index.active") }}</option>
                        <option value="2" {{ "2" == $is_active ? "selected" : null }}>{{ trans("index.inactive") }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
