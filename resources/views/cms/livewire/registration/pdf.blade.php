<html>
    <head>
        <title>{{ $title }} | {{ env("APP_NAME") }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="text-center">
            <h1>{{ env("APP_NAME") }}</h1>
            <p>{{ trans("index.printed_date") }} : {{ now()->isoFormat("LLLL") }}</p>
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
                    <th class="text-center">{{ trans("index.active") }}</th>
                </tr>
                @foreach($registrations as $registration)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $registration->id }}</td>
                        <td>{{ $registration->name }}</td>
                        <td>{{ $registration->email }}</td>
                        <td>{{ $registration->phone }}</td>
                        <td class="text-center">{{ Str::translate($registration->gender?->name) }}</td>
                        <td>{{ $registration->school }}</td>
                        <td>{{ $registration->major }}</td>
                        <td>{{ $registration->city }}</td>
                        <td class="text-center">{{ Str::translate($registration->type?->name) }}</td>
                        <td class="text-center">{{ Str::translate(Str::active($registration->is_active)) }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
