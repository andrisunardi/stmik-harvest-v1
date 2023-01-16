<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.date") }}</b></th>
        <th align="center"><b>{{ trans("index.file") }}</b></th>
        <th align="center"><b>{{ trans("index.information") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($bankBcas as $bankBca)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $bankBca->id }}</td>
            <td align="center">{{ $bankBca->code }}</td>
            <td>{{ $bankBca->name }}</td>
            <td>
                @if ($bankBca->date)
                    {{ $bankBca->date->format("l,") }}
                    {{ $bankBca->date->isoFormat("LL") }}
                @endif
            </td>
            <td>{{ $bankBca->file_url }}</td>
            <td>{{ $bankBca->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($bankBca->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
