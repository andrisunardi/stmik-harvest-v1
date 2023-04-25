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
                    <th class="text-center">{{ trans("index.permission") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.permission") }}</th>
                    <th class="text-center">{{ trans("index.total") }} {{ trans("index.user") }}</th>
                </tr>
                @foreach($roles as $role)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->permissions->pluck("name")->join(", ") }}</td>
                        <td class="text-center">{{ $role->permissions->count() }}</td>
                        <td class="text-center">{{ $role->users->count() }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
