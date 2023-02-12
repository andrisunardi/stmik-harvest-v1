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
                    <th class="text-center"><b>{{ trans("index.description") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.graduate") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.image") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.active") }}</b></th>
                </tr>
                @foreach($testimonies as $testimony)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $testimony->id }}</td>
                    <td>{{ $testimony->name }}</td>
                    <td>{{ $testimony->description }}</td>
                    <td>{{ $testimony->graduate }}</td>
                    <td>{{ $testimony->image_url }}</td>
                    <td class="text-center">{{ Str::translate(Str::active($testimony->is_active)) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
