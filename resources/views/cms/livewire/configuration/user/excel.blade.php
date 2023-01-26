<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.username") }}</b></th>
        <th align="center"><b>{{ trans("index.email") }}</b></th>
        <th align="center"><b>{{ trans("index.phone") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
        <th align="center"><b>{{ trans("index.roles_and_permissions") }}</b></th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($user->is_active), "_")) }}</td>
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
