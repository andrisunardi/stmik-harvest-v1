<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->isoFormat("LLLL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.icon") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($values as $value)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->name_idn }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->description_idn }}</td>
            <td>{{ $value->icon }}</td>
            <td align="center">{{ Str::translate(Str::active($value->is_active)) }}</td>
        </tr>
    @endforeach
</table>
