@push("css")
@endpush

@push("script")
    {{-- SNOW FLAKES - https://github.com/hcodes/snowflakes --}}
    @if (now()->format("m") == 12)
        <script src="{{ asset("https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js") }}"></script>
        <script src="{{ asset("vendors/snowflakes/snowflakes.min.js") }}"></script>
        <script>
            Snowflakes();
        </script>
    @endif
    {{-- SNOW FLAKES - https://github.com/hcodes/snowflakes --}}
@endpush
