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
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.deposit") }}</b></th>
    </tr>
    @foreach ($depositCategories as $depositCategory)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $depositCategory->id }}</td>
            <td align="center">{{ $depositCategory->code }}</td>
            <td>{{ $depositCategory->name }}</td>
            <td>{{ $depositCategory->description }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($depositCategory->is_active), "_")) }}</td>
            <td align="center">{{ $depositCategory->deposits->count() }}</td>
        </tr>
    @endforeach
</table>
