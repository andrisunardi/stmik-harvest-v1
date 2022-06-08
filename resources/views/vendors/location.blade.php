@push("script")
    <script>
        $(document).ready(function(){
            $("#country").change(function(){
                $("#province").append('<option value="" selected="selected">{{ trans("message.Now Loading Data, Please Wait") }}</option>');
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
                        $("#province").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Province") }}</option>');
                        $.each(result, function(key, value) {
                            $("#province").append($("<option>", {value:value.id, text:value.name}));
                        });
                        $("#city").empty();
                        $("#city").append('<option value="">{{ trans("index.Select") }} {{ trans("index.City") }}</option>');
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.Select") }} {{ trans("index.District") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                    },

                    error: function(){
                        $("#province").empty();
                        $("#province").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Province") }}</option>');
                        $("#city").empty();
                        $("#city").append('<option value="">{{ trans("index.Select") }} {{ trans("index.City") }}</option>');
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.Select") }} {{ trans("index.District") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                    }
                });
            });

            $("#province").change(function(){
                $("#city").append('<option value="" selected="selected">{{ trans("message.Now Loading Data, Please Wait") }}</option>');
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
                        $("#city").append('<option value="">{{ trans("index.Select") }} {{ trans("index.City") }}</option>');
                        $.each(result, function(key, value) {
                            $("#city").append($("<option>", {value:value.id, text:value.name}));
                        });
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.Select") }} {{ trans("index.District") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                    },

                    error: function(){
                        $("#city").empty();
                        $("#city").append('<option value="">{{ trans("index.Select") }} {{ trans("index.City") }}</option>');
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.Select") }} {{ trans("index.District") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                    }
                });
            });

            $("#city").change(function(){
                $("#district").append('<option value="" selected="selected">{{ trans("message.Now Loading Data, Please Wait") }}</option>');
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
                        $("#district").append('<option value="">{{ trans("index.Select") }} {{ trans("index.District") }}</option>');
                        $.each(result, function(key, value) {
                            $("#district").append($("<option>", {value:value.id, text:value.name}));
                        });
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                    },

                    error: function(){
                        $("#district").empty();
                        $("#district").append('<option value="">{{ trans("index.Select") }} {{ trans("index.District") }}</option>');
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                    }
                });
            });

            $("#district").change(function(){
                $("#village").append('<option value="" selected="selected">{{ trans("message.Now Loading Data, Please Wait") }}</option>');
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
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                        $.each(result, function(key, value) {
                            $("#village").append($("<option>", {value:value.id, text:value.name}));
                        });
                    },

                    error: function(){
                        $("#village").empty();
                        $("#village").append('<option value="">{{ trans("index.Select") }} {{ trans("index.Village") }}</option>');
                    }
                });
            });
        });
    </script>
@endpush
