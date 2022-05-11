@push("script")
    <script src="{{ asset("vendors/lozad/js/lozad.min.js") }}"></script>
    <script>
        const observer = lozad();
        observer.observe();
    </script>
@endpush