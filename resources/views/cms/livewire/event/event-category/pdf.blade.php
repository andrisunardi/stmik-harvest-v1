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
                    <th class="text-center">{{ trans("index.slug") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.event") }}</th>
                </tr>
                @foreach($eventCategories as $eventCategory)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $eventCategory->id }}</td>
                        <td>{{ $eventCategory->name }}</td>
                        <td>{{ $eventCategory->name_idn }}</td>
                        <td>{{ $eventCategory->description }}</td>
                        <td>{{ $eventCategory->description_idn }}</td>
                        <td>{{ $eventCategory->slug }}</td>
                        <td class="text-center">{{ Str::translate(Str::active($eventCategory->is_active)) }}</td>
                        <td class="text-center">{{ $eventCategory->events->count() }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
