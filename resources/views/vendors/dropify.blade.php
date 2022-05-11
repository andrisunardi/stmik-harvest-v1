@push("css")
    <link rel="stylesheet" href="{{ asset("vendors/dropify/css/dropify.min.css") }}">
@endpush

@push("script")
    <script type="text/javascript" src="{{ asset("vendors/dropify/js/dropify.min.js") }}"></script>
    <script>
        $(document).ready(function(){
            $(".dropify").dropify();
        });
    </script>
@endpush