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
                    <th class="text-center">{{ trans("index.email") }}</th>
                    <th class="text-center">{{ trans("index.phone") }}</th>
                    <th class="text-center">{{ trans("index.gender") }}</th>
                    <th class="text-center">{{ trans("index.school") }}</th>
                    <th class="text-center">{{ trans("index.major") }}</th>
                    <th class="text-center">{{ trans("index.city") }}</th>
                    <th class="text-center">{{ trans("index.type") }}</th>
                    <th class="text-center">{{ trans("index.is_active") }}</th>
                </tr>
                @foreach($registrations as $registration)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $registration->id }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->email }}</td>
                    <td>{{ $registration->phone }}</td>
                    <td>{{ $registration->gender?->name }}</td>
                    <td>{{ $registration->school }}</td>
                    <td>{{ $registration->major }}</td>
                    <td>{{ $registration->city }}</td>
                    <td>{{ $registration->type?->name }}</td>
                    <td class="text-center">{{ trans("index." . Str::slug(Str::active($registration->is_active), "_")) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
