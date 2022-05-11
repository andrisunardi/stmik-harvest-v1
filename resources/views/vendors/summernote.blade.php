@push("css")
    <link rel="stylesheet" href="{{ asset("vendors/summernote/css/summernote-bs4.min.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/summernote/css/codemirror.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/summernote/css/monokai.css") }}">
    {{-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css"> --}}
@endpush

@push("script")
    <script src="{{ asset("vendors/summernote/js/summernote-bs4.min.js") }}"></script>
    <script src="{{ asset("vendors/summernote/js/codemirror.js") }}"></script>
    <script src="{{ asset("vendors/summernote/js/xml.js") }}"></script>
    <script src="{{ asset("vendors/summernote/js/formatting.js") }}"></script>
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script> --}}
    <script>
        $(".wysiwyg-editor-summernote").summernote({
            // height: 1000,
            // minHeight: null,
            // maxHeight: null,
            // maxWidth: 100,
            // toolbar: [
            //     ["style", ["style"]],
            //     ["font", ["bold", "italic", "underline", "strikethrough", "superscript", "subscript", "clear"]],
            //     ["color", ["color"]],
            //     ["para", ["ul", "ol", "paragraph"]],
            //     ["insert", ["link", "picture", "hr"]],
            //     ["view", ["fullscreen", "codeview"]],
            //     ["help", ["help"]]
            // ],
            codemirror: {
                mode: "text/html",
                theme: "monokai",
                htmlMode: true,
                lineNumbers: true,
                lineWrapping: true,
            },
            // callbacks: {
            //     onInit: function() {
            //         console.log("Summernote is launched");
            //         $(this).summernote("codeview.activate");
            //         $("#title").focus();
            //     }
            // }
        });
    </script>
@endpush
