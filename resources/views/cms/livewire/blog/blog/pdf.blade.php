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
                    <th class="text-center"><b>{{ trans("index.blog_category") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.title") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.title_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.short_body") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.short_body_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.body") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.body_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.date") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.tag") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.tag_idn") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.image") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.slug") }}</b></th>
                    <th class="text-center"><b>{{ trans("index.is_active") }}</b></th>
                </tr>
                @foreach($blogs as $blog)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $blog->id }}</td>
                    <td>{{ $blog->blogCategory?->name }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->title_idn }}</td>
                    <td>{{ $blog->short_body }}</td>
                    <td>{{ $blog->short_body_idn }}</td>
                    <td>{{ $blog->body }}</td>
                    <td>{{ $blog->body_idn }}</td>
                    <td>
                        @if ($blog->date)
                            {{ $blog->date->format("l,") }}
                            {{ $blog->date->isoFormat("LL") }}
                            <br>
                            ({{ $blog->date->diffForHumans() }})
                        @endif
                    </td>
                    <td>{{ $blog->tag }}</td>
                    <td>{{ $blog->tag_idn }}</td>
                    <td>{{ $blog->image_url }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($blog->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>