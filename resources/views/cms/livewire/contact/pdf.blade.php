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
                    <th class="text-center">{{ trans("index.company") }}</th>
                    <th class="text-center">{{ trans("index.email") }}</th>
                    <th class="text-center">{{ trans("index.phone") }}</th>
                    <th class="text-center">{{ trans("index.subject") }}</th>
                    <th class="text-center">{{ trans("index.message") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
                </tr>
                @foreach($contacts as $contact)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->company }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td class="text-center">{{ Str::translate(Str::active($contact->is_active)) }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
