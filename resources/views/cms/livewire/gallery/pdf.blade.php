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
                    <th class="text-center"><b>{{ trans("index.tag") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.tag_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.image") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.video") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.youtube") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.is_active") }}</b></th>
                </tr>
                @foreach($galleries as $gallery)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $gallery->id }}</td>
                    <td>{{ $gallery->name }}</td>
                    <td>{{ $gallery->name_idn }}</td>
                    <td>{{ $gallery->description }}</td>
                    <td>{{ $gallery->description_idn }}</td>
                    <td>{{ $gallery->tag }}</td>
                    <td>{{ $gallery->tag_idn }}</td>
                    <td>{{ $gallery->image_url }}</td>
                    <td>{{ $gallery->video_url }}</td>
                    <td>{{ $gallery->youtube }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($gallery->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
