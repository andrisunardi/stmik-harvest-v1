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
                    <th class="text-center">{{ trans("index.code") }}</th>
                    <th class="text-center">{{ trans("index.name") }}</th>
                    <th class="text-center">{{ trans("index.description") }}</th>
                    <th class="text-center">{{ trans("index.at") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.video") }}</th>
                    <th class="text-center">{{ trans("index.datetime") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($documentations as $documentation)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $documentation->id }}</td>
                    <td class="text-center">{{ $documentation->code }}</td>
                    <td>
                        @if ($documentation->datetime)
                            {{ $documentation->datetime->format("l, H:i:s") }}<br>
                            {{ $documentation->datetime->isoFormat("LL") }}<br>
                            ({{ $documentation->datetime->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $documentation->name }}</td>
                    <td>{{ $documentation->description }}</td>
                    <td>{{ $documentation->at }}</td>
                    <td>{{ $documentation->image_url }}</td>
                    <td>{{ $documentation->video_url }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($documentation->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
