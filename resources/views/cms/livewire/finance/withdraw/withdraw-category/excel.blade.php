<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.withdraw") }}</b></th>
    </tr>
    @foreach ($withdrawCategories as $withdrawCategory)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $withdrawCategory->id }}</td>
            <td align="center">{{ $withdrawCategory->code }}</td>
            <td>{{ $withdrawCategory->name }}</td>
            <td>{{ $withdrawCategory->description }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($withdrawCategory->is_active), "_")) }}</td>
            <td align="center">{{ $withdrawCategory->withdraws->count() }}</td>
        </tr>
    @endforeach
</table>
