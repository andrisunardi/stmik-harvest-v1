<html>
    <head>
        <title>{{ $title }} | {{ env("APP_NAME") }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="text-center">
            <h1>{{ env("APP_NAME") }}</h1>
            <p>{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</p>
        </div>

        <main class="text-center">
            <h5 class="text-uppercase">{{ $title }}</h5>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center" width="1%">{{ trans("index.#") }}</th>
                    <th class="text-center" width="1%">{{ trans("index.id") }}</th>
                    <th class="text-center"><b>{{ trans("index.name") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.name_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.description") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.description_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.button_name") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.button_name_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.button_link") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.image") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.is_active") }}</b></th>
                </tr>
                @foreach($sliders as $slider)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $slider->id }}</td>
                    <td>{{ $slider->name }}</td>
                    <td>{{ $slider->name_idn }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>{{ $slider->description_idn }}</td>
                    <td>{{ $slider->button_name }}</td>
                    <td>{{ $slider->button_name_idn }}</td>
                    <td>{{ $slider->button_link }}</td>
                    <td>{{ $slider->image_url }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($slider->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>