<table>
    <tr><th align="center" colspan="7"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="7"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="7">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($procedures as $procedure)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $procedure->id }}</td>
            <td>{{ $procedure->name }}</td>
            <td>{{ $procedure->name_idn }}</td>
            <td>{{ $procedure->description }}</td>
            <td>{{ $procedure->description_idn }}</td>
            <td align="center">{{ Str::translate(Str::active($procedure->is_active)) }}</td>
        </tr>
    @endforeach
</table>
