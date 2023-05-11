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
                    <th class="text-center">{{ trans("index.username") }}</th>
                    <th class="text-center">{{ trans("index.email") }}</th>
                    <th class="text-center">{{ trans("index.phone") }}</th>
                    <th class="text-center">{{ trans("index.active") }}</th>
                    <th class="text-center">{{ trans("index.roles_and_permission") }}</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td class="text-center">{{ Str::translate(Str::active($user->is_active)) }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $loop->iteration }}. {{ $role->name }}<br />
                                @foreach ($role->permissions as $permission)
                                    {{ $loop->iteration }}. {{ $permission->name }}<br />
                                @endforeach
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        </main>
    </body>
</html>
