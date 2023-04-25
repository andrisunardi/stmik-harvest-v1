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
                    <th class="text-center">{{ trans("index.blog_category") }}</th>
                    <th class="text-center">{{ trans("index.title") }}</th>
                    <th class="text-center">{{ trans("index.title_idn") }}</th>
                    <th class="text-center">{{ trans("index.short_body") }}</th>
                    <th class="text-center">{{ trans("index.short_body_idn") }}</th>
                    <th class="text-center">{{ trans("index.body") }}</th>
                    <th class="text-center">{{ trans("index.body_idn") }}</th>
                    <th class="text-center">{{ trans("index.date") }}</th>
                    <th class="text-center">{{ trans("index.tag") }}</th>
                    <th class="text-center">{{ trans("index.tag_idn") }}</th>
                    <th class="text-center">{{ trans("index.image") }}</th>
                    <th class="text-center">{{ trans("index.slug") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
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
                                {{ $blog->date->isoFormat("dddd,") }}
                                {{ $blog->date->isoFormat("LL") }}
                                <br>
                                ({{ $blog->date->diffForHumans() }})
                            @endif
                        </td>
                        <td>{{ $blog->tag }}</td>
                        <td>{{ $blog->tag_idn }}</td>
                        <td>{{ $blog->image_url }}</td>
                        <td>{{ $blog->slug }}</td>
                        <td class="text-center">{{ Str::translate(Str::active($blog->is_active)) }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
