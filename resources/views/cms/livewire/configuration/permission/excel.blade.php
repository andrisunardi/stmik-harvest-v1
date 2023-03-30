<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.guard_name") }}</b></th>
        <th align="center"><b>{{ trans("index.roles") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.role") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.user") }}</b></th>
    </tr>
    @foreach ($permissions as $permission)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name }}</td>
            <td>{{ $permission->roles->pluck("name")->join(", ") }}</td>
            <td align="center">{{ $permission->roles->count() }}</td>
            <td align="center">{{ $permission->users->count() }}</td>
        </tr>
    @endforeach
</table>
