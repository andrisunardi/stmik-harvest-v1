<div>
    <div id="advanced-search" class="collapse {{ $advanced_search ? "show" : null }}">
        <div class="row">
            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php($input = "per_page")
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
                @php($input = "order_by")
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="id" {{ "id" == $order_by ? "selected" : null }}>{{ trans("index.id") }}</option>
                        <option value="log_name" {{ "log_name" == $order_by ? "selected" : null }}>{{ trans("index.log_name") }}</option>
                        <option value="description" {{ "description" == $order_by ? "selected" : null }}>{{ trans("index.description") }}</option>
                        <option value="event" {{ "event" == $order_by ? "selected" : null }}>{{ trans("index.event") }}</option>
                        <option value="subject_type" {{ "subject_type" == $order_by ? "selected" : null }}>{{ trans("index.subject_type") }}</option>
                        <option value="subject_id" {{ "subject_id" == $order_by ? "selected" : null }}>{{ trans("index.subject_id") }}</option>
                        <option value="causer_type" {{ "causer_type" == $order_by ? "selected" : null }}>{{ trans("index.causer_type") }}</option>
                        <option value="causer_id" {{ "causer_id" == $order_by ? "selected" : null }}>{{ trans("index.causer_id") }}</option>
                        <option value="properties" {{ "properties" == $order_by ? "selected" : null }}>{{ trans("index.properties") }}</option>
                        <option value="batch_uuid" {{ "batch_uuid" == $order_by ? "selected" : null }}>{{ trans("index.batch_uuid") }}</option>
                        <option value="user_id" {{ "user_id" == $order_by ? "selected" : null }}>{{ trans("index.user") }}</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php($input = "sort_by")
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <select wire:model="{{ $input }}" class="form-select select2" id="{{ $input }}">
                        <option value="asc" {{ "asc" == $sort_by ? "selected" : null }}>{{ trans("index.ascending") }}</option>
                        <option value="desc" {{ "desc" == $sort_by ? "selected" : null }}>{{ trans("index.descending") }}</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php($input = "start_created_at")
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php($input = "end_created_at")
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php($input = "start_updated_at")
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>

            <div class="col-sm-4 col-lg-3 col-xl-auto mb-3">
                @php($input = "end_updated_at")
                <div class="form-group">
                    <label class="form-label" for="{{ $input }}">{{ trans("validation.attributes.{$input}") }}</label>
                    <input wire:model="{{ $input }}" type="date" class="form-control" id="{{ $input }}" placeholder="{{ trans("validation.attributes.{$input}") }}">
                </div>
            </div>
        </div>
    </div>
</div>
