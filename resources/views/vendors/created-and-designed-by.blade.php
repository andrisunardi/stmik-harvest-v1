@push("script")
    <script>
        console.log(
            "%c Created and Designed By {{ env("APP_CREATOR") ? env("APP_CREATOR") : env("APP_NAME") }}",
            "background: #{{ env("APP_COLOR") }}; color: #{{ Str::lower(env("APP_COLOR")) == "ffffff" ?"000000" : "FFFFFF" }}; display: block;"
        );
    </script>
@endpush