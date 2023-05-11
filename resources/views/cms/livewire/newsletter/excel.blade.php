<table>
    <tr><th align="center" colspan="5"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="5"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="5">{{ trans("index.printed_date") }} : {{ now()->isoFormat("LLLL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.value") }}</b></th>
        <th align="center"><b>{{ trans("index.type") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($newsletters as $newsletter)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $newsletter->id }}</td>
            <td>{{ $newsletter->value }}</td>
            <td align="center">{{ Str::translate($newsletter->type?->name) }}</td>
            <td align="center">{{ Str::translate(Str::active($newsletter->is_active)) }}</td>
        </tr>
    @endforeach
</table>
