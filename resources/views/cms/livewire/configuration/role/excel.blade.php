<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.guard_name") }}</b></th>
        <th align="center"><b>{{ trans("index.permissions") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.permission") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.user") }}</b></th>
    </tr>
    @foreach ($roles as $role)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->guard_name }}</td>
            <td>{{ $role->permissions->pluck("name")->join(", ") }}</td>
            <td align="center">{{ $role->permissions->count() }}</td>
            <td align="center">{{ $role->users->count() }}</td>
        </tr>
    @endforeach
</table>
