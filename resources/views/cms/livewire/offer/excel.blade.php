<table>
    <tr><th align="center" colspan="10"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="10"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="10">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.button_name") }}</b></th>
        <th align="center"><b>{{ trans("index.button_name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.button_link") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($offers as $offer)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $offer->id }}</td>
            <td>{{ $offer->name }}</td>
            <td>{{ $offer->name_idn }}</td>
            <td>{{ $offer->description }}</td>
            <td>{{ $offer->description_idn }}</td>
            <td>{{ $offer->button_name }}</td>
            <td>{{ $offer->button_name_idn }}</td>
            <td>
                <a draggable="false" href="{{ $offer->button_link }}" target="_blank">
                    {{ $offer->button_link }}
                </a>
            </td>
            <td align="center">{{ Str::translate(Str::active($offer->is_active)) }}</td>
        </tr>
    @endforeach
</table>
