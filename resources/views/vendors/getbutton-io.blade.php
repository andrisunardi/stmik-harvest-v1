@push("script")
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "62{{ Str::substr(Str::slug(env("CONTACT_WHATSAPP"), ""), 1) }}",
                facebook: "{{ env("FACEBOOK_PAGE") }}",
                instagram: "{{ env("SOCIAL_MEDIA_INSTAGRAM") }}",
                email: "{{ env("CONTACT_EMAIL") }}",
                call: "62{{ Str::substr(Str::slug(env("CONTACT_PHONE"), ""), 1) }}",
                sms: "62{{ Str::substr(Str::slug(env("CONTACT_PHONE"), ""), 1) }}",
                link: "{{ env("APP_URL") }}",
                greeting_message: "{{ trans("general.Welcome to") }} {{ env("APP_TITLE") }}",
                disable_branding: "yes",
                company_logo_url: "{{ env("APP_URL") }}/images/favicon.png",
                call_to_action: "{{ trans("message.Contact Us If You Have Any Questions") }}",
                button_color: "#{{ env("APP_COLOR") }}",
                position: "left",
                order: "whatsapp,instagram"
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
@endpush