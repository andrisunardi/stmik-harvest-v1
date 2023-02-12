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
                    <th class="text-center"><b>{{ trans("index.link") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.image") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.active") }}</b></th>
                </tr>
                @foreach($networks as $network)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $network->id }}</td>
                    <td>{{ $network->name }}</td>
                    <td>{{ $network->description }}</td>
                    <td>{{ $network->link }}</td>
                    <td>{{ $network->image_url }}</td>
                    <td class="text-center">{{ Str::translate(Str::active($network->is_active)) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
