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
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.deposit") }}</th>
                </tr>
                @foreach($depositCategories as $depositCategory)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $depositCategory->id }}</td>
                    <td class="text-center">{{ $depositCategory->code }}</td>
                    <td>{{ $depositCategory->name }}</td>
                    <td>{{ $depositCategory->description }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($depositCategory->is_active), "_")) }}</td>
                    <td class="text-center">{{ $depositCategory->deposits->count() }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>