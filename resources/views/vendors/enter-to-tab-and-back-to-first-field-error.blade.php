@push("script")
    <script>
        document.addEventListener("keydown", function (event) {
            if (event.keyCode === 13 && event.target.nodeName === "INPUT") {
                var form = event.target.form;
                var index = Array.prototype.indexOf.call(form, event.target);
                form.elements[index + 1].focus();
                // event.preventDefault();
            }
        });
        $("button[type=submit]").click(function() {
            // event.preventDefault();
            // event.stopPropagation();
            var errorElements = document.querySelectorAll(".form-control:invalid");
            for (let index = 0; index < errorElements.length; index++) {
                const element = errorElements[index];
                $("html, body").animate({
                    scrollTop: $(errorElements[0]).focus().offset().top - 25
                }, 1000);
                // return false;
            }
        });
    </script>
@endpush