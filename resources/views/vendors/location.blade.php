@push("script")
    <script>
        $(document).ready(function(){
            $("#country").change(function(){
                $("#province").append('<option value="" selected="selected">{{ trans("index.now_loading_data_please_wait") }}</option>');
                $("#province").attr("disabled", "disabled");
                var id = $("#country").val();

                $.ajax({
                    url: "{{ url("ajax/country") }}",
                    dataType: "json",
                    type: "POST",
                    method: "POST",
                    cache: true,
                    data:{
                        _token: "{{ csrf_token() }}",
                        id: id
                    },

                    success: function(result)
                    {
                        $("#province").empty();
                        $("#province").removeAttr("disabled");
                        $("#province").append('<option value="">{{ trans("index.select") }} {{ trans("index.Province") }}</option>');
                        $.each(result, function(key, value) {
                            $("#province").append($("<option>", {value:value.id, text:value.name}));
                        });
                        $("#city").empty();
                        $("#city").append('<option value="">{{ trans("index.select") }} {{ trans("index.city") }}</option>');
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.select") }} {{ trans("index.district") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                    },

                    error: function(){
                        $("#province").empty();
                        $("#province").append('<option value="">{{ trans("index.select") }} {{ trans("index.Province") }}</option>');
                        $("#city").empty();
                        $("#city").append('<option value="">{{ trans("index.select") }} {{ trans("index.city") }}</option>');
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.select") }} {{ trans("index.district") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                    }
                });
            });

            $("#province").change(function(){
                $("#city").append('<option value="" selected="selected">{{ trans("index.now_loading_data_please_wait") }}</option>');
                $("#city").attr("disabled", "disabled");
                var id = $("#province").val();

                $.ajax({
                    url: "{{ url("ajax/province") }}",
                    dataType: "json",
                    type: "POST",
                    method: "POST",
                    cache: true,
                    data:{
                        _token: "{{ csrf_token() }}",
                        id: id
                    },

                    success: function(result)
                    {
                        $("#city").empty();
                        $("#city").removeAttr("disabled");
                        $("#city").append('<option value="">{{ trans("index.select") }} {{ trans("index.city") }}</option>');
                        $.each(result, function(key, value) {
                            $("#city").append($("<option>", {value:value.id, text:value.name}));
                        });
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.select") }} {{ trans("index.district") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                    },

                    error: function(){
                        $("#city").empty();
                        $("#city").append('<option value="">{{ trans("index.select") }} {{ trans("index.city") }}</option>');
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.select") }} {{ trans("index.district") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                    }
                });
            });

            $("#city").change(function(){
                $("#district").append('<option value="" selected="selected">{{ trans("index.now_loading_data_please_wait") }}</option>');
                $("#district").attr("disabled", "disabled");
                var id = $("#city").val();

                $.ajax({
                    url: "{{ url("ajax/city") }}",
                    dataType: "json",
                    type: "POST",
                    method: "POST",
                    cache: true,
                    data:{
                        _token: "{{ csrf_token() }}",
                        id: id
                    },

                    success: function(result)
                    {
                        $("#district").empty();
                        $("#district").removeAttr("disabled");
                        $("#district").append('<option value="">{{ trans("index.select") }} {{ trans("index.district") }}</option>');
                        $.each(result, function(key, value) {
                            $("#district").append($("<option>", {value:value.id, text:value.name}));
                        });
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                    },

                    error: function(){
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.select") }} {{ trans("index.district") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                    }
                });
            });

            $("#district").change(function(){
                $("#village").append('<option value="" selected="selected">{{ trans("index.now_loading_data_please_wait") }}</option>');
                $("#village").attr("disabled", "disabled");
                var id = $("#district").val();

                $.ajax({
                    url: "{{ url("ajax/district") }}",
                    dataType: "json",
                    type: "POST",
                    method: "POST",
                    cache: true,
                    data:{
                        _token: "{{ csrf_token() }}",
                        id: id
                    },

                    success: function(result)
                    {
                        $("#village").empty();
                        $("#village").removeAttr("disabled");
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                        $.each(result, function(key, value) {
                            $("#village").append($("<option>", {value:value.id, text:value.name}));
                        });
                    },

                    error: function(){
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.select") }} {{ trans("index.village") }}</option>');
                    }
                });
            });
        });
    </script>
@endpush