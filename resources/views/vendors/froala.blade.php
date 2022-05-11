@push("css")
    <link rel="stylesheet" href="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css") }}">
    <link rel="stylesheet" href="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.pkgd.min.css") }}" type="text/css" />
    <style>
        a[href="https://froala.com/wysiwyg-editor"], a[href="https://www.froala.com/wysiwyg-editor?k=u"] {
            display: none !important;
            position: absolute;
            top: -99999999px;
        }
    </style>
@endpush

@push("script")
    <script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js") }}"></script>
    <script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js") }}"></script>
    <script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/js/froala_editor.pkgd.min.js") }}"></script>
    <script>
        $(function(){
            $(".wysiwyg-editor-froala").froalaEditor({
                enter: $.FroalaEditor.ENTER_BR,
                toolbarStickyOffset: 0,
                charCounterMax: 65535,
                fontFamilySelection: true,
                fontSizeSelection: true,
                paragraphFormatSelection: true
            })
        });
    </script>
@endpush