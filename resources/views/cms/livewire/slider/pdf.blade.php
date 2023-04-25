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
                    <th class="text-center">{{ trans("index.name") }}</th>
                    <th class="text-center">{{ trans("index.name_idn") }}</th>
                    <th class="text-center">{{ trans("index.description") }}</th>
                    <th class="text-center">{{ trans("index.description_idn") }}</th>
                    <th class="text-center">{{ trans("index.button_name") }}</th>
                    <th class="text-center">{{ trans("index.button_name_idn") }}</th>
                    <th class="text-center">{{ trans("index.button_link") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
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
                        <td class="text-center">{{ Str::translate(Str::active($slider->is_active)) }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
