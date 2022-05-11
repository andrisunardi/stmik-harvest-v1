@push("script")
    <script>
        var timeDisplay = document.getElementById("clock");

        function refreshTime() {
            var dateString = new Date().toLocaleString("id", {timeZone: "Asia/Jakarta"});
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.innerHTML = formattedString;
        }

        setInterval(refreshTime, 1000);

        // var clock = document.getElementById("clock");

        // function time() {
        //     var d = new Date();
        //     var s = d.getSeconds();
        //     var m = d.getMinutes();
        //     var h = d.getHours();
        //     clock.textContent =
        //         ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
        // }

        // setInterval(time, 1000);
    </script>
@endpush
