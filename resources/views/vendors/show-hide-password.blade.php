@push("script")
    <script>
        @if (old())
            @if (old("show-hide-password") == "1")
                $("#eye-on").hide();
                $("#password").attr("type","text");
                $("#eye-off").removeClass("d-none");
            @else
                $("#eye-off").hide();
                $("#password").attr("type","password");
            @endif
        @else
            $("#eye-off").hide();
        @endif
            $("#show-hide-password").click(function(){
                if($(this).is(":checked")){
                    $("#password").attr("type","text");
                    $("#eye-on").hide();
                    $("#eye-off").show();
                    $("#eye-off").removeClass("d-none");
                }else{
                    $("#password").attr("type","password");
                    $("#eye-on").show();
                    $("#eye-off").hide();
                }
            });

        @if (old())
            @if (old("show-hide-current-password") == "1")
                $("#eye-on-current-password").hide();
                $("#current_password").attr("type","text");
                $("#eye-off-current-password").removeClass("d-none");
            @else
                $("#eye-off-current-password").hide();
                $("#current_password").attr("type","password");
            @endif
        @else
            $("#eye-off-current-password").hide();
        @endif
            $("#show-hide-current-password").click(function(){
                if($(this).is(":checked")){
                    $("#current_password").attr("type","text");
                    $("#eye-on-current-password").hide();
                    $("#eye-off-current-password").show();
                    $("#eye-off-current-password").removeClass("d-none");
                }else{
                    $("#current_password").attr("type","password");
                    $("#eye-on-current-password").show();
                    $("#eye-off-current-password").hide();
                }
            });

        @if (old())
            @if (old("show-hide-new-password") == "1")
                $("#eye-on-new-password").hide();
                $("#new_password").attr("type","text");
                $("#eye-off-new-password").removeClass("d-none");
            @else
                $("#eye-off-new-password").hide();
                $("#new_password").attr("type","password");
            @endif
        @else
            $("#eye-off-new-password").hide();
        @endif
            $("#show-hide-new-password").click(function(){
                if($(this).is(":checked")){
                    $("#new_password").attr("type","text");
                    $("#eye-on-new-password").hide();
                    $("#eye-off-new-password").show();
                    $("#eye-off-new-password").removeClass("d-none");
                }else{
                    $("#new_password").attr("type","password");
                    $("#eye-on-new-password").show();
                    $("#eye-off-new-password").hide();
                }
            });

        @if (old())
            @if (old("show-hide-confirm-password") == "1")
                $("#eye-on-confirm-password").hide();
                $("#confirm_password").attr("type","text");
                $("#eye-off-confirm-password").removeClass("d-none");
            @else
                $("#eye-off-confirm-password").hide();
                $("#confirm_password").attr("type","password");
            @endif
        @else
            $("#eye-off-confirm-password").hide();
        @endif
            $("#show-hide-confirm-password").click(function(){
                if($(this).is(":checked")){
                    $("#confirm_password").attr("type","text");
                    $("#eye-on-confirm-password").hide();
                    $("#eye-off-confirm-password").show();
                    $("#eye-off-confirm-password").removeClass("d-none");
                }else{
                    $("#confirm_password").attr("type","password");
                    $("#eye-on-confirm-password").show();
                    $("#eye-off-confirm-password").hide();
                }
            });
    </script>
@endpush
