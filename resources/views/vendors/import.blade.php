<div class="modal fade" id="import-data-master" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-import-data-master" role="form" enctype="multipart/form-data" class="needs-validation" novalidate method="post" action="{{ route($menu->as($menu->id) . "$slug.import") }}">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title text-wrap">{{ trans("index.Import Data Master") }} @yield("name")</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ trans("button.Close") }}"></button>
                </div>
                <div class="modal-body">
                    @php $input_name = "file"; $input_label = Str::replace("_", " ", Str::title($input_name)); $input_type = "file"; $input_icon = "fas fa-file-excel"; $input_min = ""; $input_max = ""; $input_minlength = "1"; $input_maxlength = "20"; $input_multiple = "false"; $input_autofocus = "false"; $input_required = "true";
                                        $input_readonly = "false";
                                        $input_disabled = "false"; @endphp
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="{{ $input_type }}" class="form-control dropify @if(old()){{ $errors->has($input_name) ? "is-invalid" : "is-valid" }}@endif" id="{{ $input_name }}" name="{{ $input_name }}" min="{{ $input_min }}" max="{{ $input_max }}" minlength="{{ $input_minlength }}" maxlength="{{ $input_maxlength }}" data-parsley-minlength="{{ $input_minlength }}" data-parsley-maxlength="{{ $input_maxlength }}" value="" placeholder="{{ trans("index.$input_label") }}" aria-label="{{ trans("index.$input_label") }}" aria-describedby="{{ trans("index.$input_label") }}" autocomplete="off" autocapitalize="none" accept="image/*;capture=camera" accept=".xls, .xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" accept=".xls, .xlsx" data-allowed-file-extensions="xls xlsx" data-max-file-size="2M" data-default-file="" {{ $input_multiple == "true" ? "multiple" : "" }} {{ $input_autofocus == "true" ? "autofocus" : "" }} {{ $input_required == "true" ? "required" : "" }} {{ $input_readonly == "true" ? "readonly" : "" }} {{ $input_disabled == "true" ? "disabled" : "" }}>
                                <div class="valid-feedback rounded bg-success p-2 mt-2 text-white">{{ trans("index.Looks Good") }}</div>
                                <div class="invalid-feedback rounded bg-danger p-2 mt-2 text-white">@error($input_name){{ $message }}@else{{ trans("index.Please Fill In Correctly") }}@enderror</div>
                            </div>
                            <div class="form-text mt-2">{{ trans("index.Format") }} .xls, .xlsx {{ trans("index.and max size") }} 2mb</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times fa-fw mr-1"></i> {{ trans("index.Cancel") }}</button>
                    <button type="submit" class="btn btn-{{ env("APP_COLOR_CLASS") }}"><i class="fas fa-save fa-fw me-1"></i> {{ trans("index.Save") }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
