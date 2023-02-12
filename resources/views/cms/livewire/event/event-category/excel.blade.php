<table>
    <tr><th align="center" colspan="9"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="9"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="9">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.slug") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.event") }}</b></th>
    </tr>
    @foreach ($eventCategories as $eventCategory)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $eventCategory->id }}</td>
            <td>{{ $eventCategory->name }}</td>
            <td>{{ $eventCategory->name_idn }}</td>
            <td>{{ $eventCategory->description }}</td>
            <td>{{ $eventCategory->description_idn }}</td>
            <td>{{ $eventCategory->slug }}</td>
            <td align="center">{{ Str::translate(Str::active($eventCategory->is_active)) }}</td>
            <td align="center">{{ $eventCategory->events->count() }}</td>
        </tr>
    @endforeach
</table>
