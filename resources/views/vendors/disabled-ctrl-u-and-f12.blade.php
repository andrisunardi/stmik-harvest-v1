@push("script")
    <script>
        document.onkeydown = function(e) {
            event = (event || window.event);
            if (
                event.keyCode == 85 ||
                // event.keyCode == 86 || // DISABLE PASTE
                event.keyCode == 117 ||
                event.keyCode == 123 // DISABLE F12
            ) {
                return false;
            }
            if (
                e.ctrlKey &&
                (
                    e.keyCode === 85 |
                    // e.keyCode === 86 || // DISABLE PASTE
                    e.keyCode === 117 ||
                    e.keyCode === 123 // DISABLE F12
                )
            ) {
                return false;
            } else {
                return true;
            }
        };
    </script>
@endpush