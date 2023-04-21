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
                    <th class="text-center">{{ trans("index.date") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
                </tr>
                @foreach($admissionCalendars as $admissionCalendar)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $admissionCalendar->id }}</td>
                    <td>{{ $admissionCalendar->name }}</td>
                    <td>{{ $admissionCalendar->name_idn }}</td>
                    <td>{{ $admissionCalendar->description }}</td>
                    <td>{{ $admissionCalendar->description_idn }}</td>
                    <td>
                        @if ($admissionCalendar->date)
                            {{ $admissionCalendar->date->isoFormat("dddd,") }}
                            {{ $admissionCalendar->date->isoFormat("LL") }}
                            <br>
                            ({{ $admissionCalendar->date->diffForHumans() }})
                        @endif
                    </td>
                    <td class="text-center">{{ Str::translate(Str::active($admissionCalendar->is_active)) }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
