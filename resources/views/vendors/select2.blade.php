@push("css")
    <link href="{{ asset("vendors/select2/css/select2.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/select2/css/select2-bootstrap4.min.css") }}" rel="stylesheet">
@endpush

@push("script")
    <script src="{{ asset("vendors/select2/js/select2.min.js") }}"></script>
    <script>
        $(".select2").select2({
            theme: "bootstrap4",
            dropdownAutoWidth : true,
            width: "resolve", // auto
        });
    </script>
@endpush
