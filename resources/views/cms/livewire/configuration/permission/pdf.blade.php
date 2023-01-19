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
                    <th class="text-center">{{ trans("index.guard_name") }}</th>
                    <th class="text-center">{{ trans("index.roles") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.role") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.user") }}</th>
                </tr>
                @foreach($permissions as $permission)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>{{ $permission->roles->pluck("name")->join(", ") }}</td>
                    <td class="text-center">{{ $permission->roles->count() }}</td>
                    <td class="text-center">{{ $permission->users->count() }}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
